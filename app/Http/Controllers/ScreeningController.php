<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;
use App\Models\Gejala;
use App\Models\Konsultasi;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\User;
use App\Models\Hasil;
use \Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScreeningController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $kondisis = Kondisi::all();
        $gejalas = Gejala::all();
        return view('screening', compact('gejalas'));
    }

    function get_best_result($arr)
    {
        $maxValue = -INF;
        $maxArray = [];

        foreach ($arr as $item) {
            $value = $item[1];

            if ($value > $maxValue && $item[0] != "") {
                $maxValue = $value;
                $maxArray = $item;
            }
        }

        if ($maxArray[0] === "p2,p3") {
            $maxArray[0] = "p2";
        } else if ($maxArray[0] === "p1,p2,p3") {
            $maxArray[0] = "p1";
        }

        return $maxArray;
    }


    function group_array_result($arr)
    {
        $groupedArray = [];

        foreach ($arr as $item) {
            // key grup pertama
            $key = $item[0];

            if (!isset($groupedArray[$key])) {
                // buat grup baru jika belum ada
                $groupedArray[$key] = $item[1];
            } else {
                // jika sudah ada maka tinggal ditambahkan
                $groupedArray[$key] += $item[1];
            }
        }

        $resultArray = [];

        foreach ($groupedArray as $key => $value) {
            // generate array baru berdasarkan key value
            if (isset($groupedArray[""])) {
                // jika ada nilai kosong hasil p1, p2 dan p3
                $resultArray[] = [$key, $value / (1 - $groupedArray[""])];
            } else {
                $resultArray[] = [$key, $value / 1];
            }
        }

        return $resultArray;
    }

    function combine_value($arr_1, $arr_2)
    {
        $new_arr = [];
        foreach ($arr_1 as $i) {
            foreach ($arr_2 as $j) {
                $r = ["", 0];
                // ["theta", 0.2] * ["theta", 0.4] = "theta"
                if ($i[0] == "theta" && $j[0] == "theta") {
                    $r[0] = "theta";
                    // ["theta", 0.2] * ["p1", 0.4] = "p1"
                } elseif ($i[0] == "theta" && $j[0] != "theta") {
                    $r[0] = $j[0];
                    // ["p1", 0.2] * ["theta", 0.4] = "p1"
                } elseif ($i[0] != "theta" && $j[0] == "theta") {
                    $r[0] = $i[0];
                } else {
                    // ["p1,p2", 0.2] * ["p2,p3", 0.4] = "p2"
                    $r[0] = implode(',', array_intersect(explode(',', $i[0]), explode(',', $j[0])));
                }

                $r[1] = $i[1] * $j[1];
                // $r = ["p2", 0.8];

                array_push($new_arr, $r);
            }
        }
        $result = $this->group_array_result($new_arr);
        return $result;
    }

    public function hasil_konsultasi(Request $request)
    {
        $pengetahuan = Pengetahuan::all();
        $data = $request->all();

        // mencari index dari selected gejala
        $selected_index = array_keys(array_filter($data, function ($value) {
            return $value == "ya";
        }));

        // preprocess data menjadi bentuk 2d
        $selected_gejala = $pengetahuan->only($selected_index)->values();
        $processed_gejala = $selected_gejala->map(function ($item) {
            $trimmedString = trim($item->diagnosa_check, '[]');
            $withoutQuotes = str_replace('"', '', $trimmedString);
            $commaSeparated = implode(',', explode(', ', $withoutQuotes));

            return [
                [$commaSeparated, $item->believe],
                ["theta", $item->plausability]
            ];
        });

        // perhitungan
        $m3 = [];
        for ($i = 0; $i < count($processed_gejala) - 1; $i += 1) {
            if (count($m3) === 0) {
                $m3 = $this->combine_value($processed_gejala[0], $processed_gejala[1]);
            } else {
                $m3 = $this->combine_value($m3, $processed_gejala[$i + 1]);
            }
        }

        $result = $this->get_best_result($m3);

        $dict = ["p1", "p2", "p3"];
        $index = array_search($result[0], $dict);

        $hasil = $index + 1;

        $data = [
            "user_id" => $request->user_id,
            "diagnosa_id" => $hasil,
            "nilai_akurasi" => $result[1]
        ];

        $hasil_data = new Hasil($data);
        $hasil_data->save();

        return view("result", ["hasil" => $hasil_data]);
    }

    public function show_hasil(Request $request, $id)
    {
        $hasil = Hasil::find($id);

        return view("result", ["hasil" => $hasil]);
    }

    public function riwayat(Request $request)
    {
        $user = Auth::user();
        $riwayat = Hasil::where('user_id', $user->id)->get();

        return view("riwayat", ["riwayat" => $riwayat]);
    }
}
