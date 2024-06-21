<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    use HasFactory;

    public const CLASSES = [
        [
            "class" => "0",
            "img" => "images/poslushik.png",
            "name" => "Thiếu Hiệp"
        ],
        [
            "class" => "1",
            "img" => "images/vimI.png",
            "name" => "Quỷ Vương Tông Tầng 1"
        ],
        [
            "class" => "2",
            "img" => "images/vimII.png",
            "name" => "Quỷ Vương Tông Tầng 2"
        ],
        [
            "class" => "3",
            "img" => "images/vimIII.png",
            "name" => "Quỷ Vương Tông Tầng 3"
        ],
        [
            "class" => "4",
            "img" => "images/hakkanI.png",
            "name" => "hợp hoan phái Tầng 1"
        ],
        [
            "class" => "5",
            "img" => "images/hakkanII.png",
            "name" => "Hợp Hoan Phái Tầng 2"
        ],
        [
            "class" => "6",
            "img" => "images/hakkanIII.png",
            "name" => "Hợp Hoan Phái Tầng 3"
        ],
        [
            "class" => "7",
            "img" => "images/aineI.png",
            "name" => "Thanh Vân Môn Tầng 1"
        ],
        [
            "class" => "8",
            "img" => "images/aineII.png",
            "name" => "Thanh Vân Môn Tầng 2"
        ],
        [
            "class" => "9",
            "img" => "images/aineIII.png",
            "name" => "Thanh Vân Môn Tầng 3"
        ],
        [
            "class" => "10",
            "img" => "images/skayaI.png",
            "name" => "Thiên Âm Tự Tầng 1"
        ],
        [
            "class" => "11",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự Tầng 2"
        ],
        [
            "class" => "12",
            "img" => "images/skayaIII.png",
            "name" => "Thiên Âm Tự Tầng 3"
        ],
        [
            "class" => "13",
            "img" => "images/vimIV.png",
            "name" => "Quỷ Vương Tông Tầng 4"
        ],
        [
            "class" => "14",
            "img" => "images/vimV.png",
            "name" => "Quỷ Vương Tông Tầng 5"
        ],
        [
            "class" => "16",
            "img" => "images/hakkanIV.png",
            "name" => "Hợp Hoan Phái Tầng 4"
        ],
        [
            "class" => "17",
            "img" => "images/hakkanV.png",
            "name" => "Hợp Hoan Phái Tầng 5"
        ],
        [
            "class" => "19",
            "img" => "images/aineIV.png",
            "name" => "Thanh Vân Môn Tầng 4"
        ],
        [
            "class" => "20",
            "img" => "images/aineV.png",
            "name" => "Thanh Vân Môn Tầng 5"
        ],
        [
            "class" => "22",
            "img" => "images/skayaIV.png",
            "name" => "Thiên Âm Tự Tầng 4"
        ],
        [
            "class" => "23",
            "img" => "images/skayaV.png",
            "name" => "Thiên Âm Tự Tầng 5"
        ],
        [
            "class" => "25",
            "img" => "images/mortoI.png",
            "name" => "Quỷ Đạo Tầng 1"
        ],
        [
            "class" => "26",
            "img" => "images/mortoII.png",
            "name" => "Quỷ Đạo Tầng 2"
        ],
        [
            "class" => "27",
            "img" => "images/mortoIII.png",
            "name" => "Quỷ Đạo Tầng 3"
        ],
        [
            "class" => "28",
            "img" => "images/mortoIV.png",
            "name" => "Quỷ Đạo Tầng 4"
        ],
        [
            "class" => "29",
            "img" => "images/mortoV.png",
            "name" => "Quỷ Đạo Tầng 5"
        ],
        [
            "class" => "33",
            "img" => "images/titanI.png",
            "name" => "Cửu Lê Tầng 1"
        ],
        [
            "class" => "34",
            "img" => "images/titanII.png",
            "name" => "Cửu Lê Tầng 2"
        ],
        [
            "class" => "35",
            "img" => "images/titanIII.png",
            "name" => "Cửu Lê Tầng 3"
        ],
        [
            "class" => "36",
            "img" => "images/titanIV.png",
            "name" => "Cửu Lê Tầng 4"
        ],
        [
            "class" => "37",
            "img" => "images/titanV.png",
            "name" => "Cửu Lê Tầng 5"
        ],
        [
            "class" => "39",
            "img" => "images/ardenI.png",
            "name" => "Liệt Sơn Tầng 1"
        ],
        [
            "class" => "40",
            "img" => "images/ardenII.png",
            "name" => "Liệt Sơn Tầng 2"
        ],
        [
            "class" => "41",
            "img" => "images/ardenIII.png",
            "name" => "Liệt Sơn Tầng 3"
        ],
        [
            "class" => "42",
            "img" => "images/ardenIV.png",
            "name" => "Liệt Sơn Tầng 4"
        ],
        [
            "class" => "43",
            "img" => "images/ardenV.png",
            "name" => "Liệt Sơn Tầng 5"
        ],
        [
            "class" => "45",
            "img" => "images/umbraI.png",
            "name" => "Hoài Quang Tầng 1"
        ],
        [
            "class" => "46",
            "img" => "images/umbraII.png",
            "name" => "Hoài Quang Tầng 2"
        ],
        [
            "class" => "47",
            "img" => "images/umbraIII.png",
            "name" => "Hoài Quang Tầng 3"
        ],
        [
            "class" => "48",
            "img" => "images/umbraIV.png",
            "name" => "Hoài Quang Tầng 4"
        ],
        [
            "class" => "49",
            "img" => "images/umbraV.png",
            "name" => "Hoài Quang Tầng 5"
        ],
        [
            "class" => "51",
            "img" => "images/vaylinI.png",
            "name" => "Thiên Hoa Tầng 1"
        ],
        [
            "class" => "52",
            "img" => "images/vaylinII.png",
            "name" => "Thiên Hoa Tầng 2"
        ],
        [
            "class" => "53",
            "img" => "images/vaylinIII.png",
            "name" => "Thiên Hoa Tầng 3"
        ],
        [
            "class" => "54",
            "img" => "images/vaylinIV.png",
            "name" => "Thiên Hoa Tầng 4"
        ],
        [
            "class" => "55",
            "img" => "images/vaylinV.png",
            "name" => "Thiên Hoa Tầng 5"
        ],
        [
            "class" => "56",
            "img" => "images/angelI.png",
            "name" => "Thần Hoàng Tầng 1"
        ],
        [
            "class" => "57",
            "img" => "images/angelII.png",
            "name" => "Thần Hoàng Tầng 2"
        ],
        [
            "class" => "58",
            "img" => "images/angelIII.png",
            "name" => "Thần Hoàng Tầng 3"
        ],
        [
            "class" => "59",
            "img" => "images/angelIV.png",
            "name" => "Thần Hoàng Tầng 4"
        ],
        [
            "class" => "60",
            "img" => "images/angelIV.png",
            "name" => "Thần Hoàng Tầng 5"
        ],
        [
            "class" => "64",
            "img" => "images/TayoI.png",
            "name" => "Phần Hương Tầng 1"
        ],
        [
            "class" => "65",
            "img" => "images/TayoII.png",
            "name" => "Phần Hương Tầng 2"
        ],
        [
            "class" => "66",
            "img" => "images/TayoIII.png",
            "name" => "Phần Hương Tầng 3"
        ],
        [
            "class" => "67",
            "img" => "images/TayoIV.png",
            "name" => "Phần Hương Tầng 4"
        ],
        [
            "class" => "68",
            "img" => "images/TayoV.png",
            "name" => "Phần Hương Tầng 5"
        ],
        [
            "class" => "96",
            "img" => "images/voydaI.png",
            "name" => "Thái Hạo Tầng 1"
        ],
        [
            "class" => "97",
            "img" => "images/voydaII.png",
            "name" => "Thái Hạo Tầng 2"
        ],
        [
            "class" => "98",
            "img" => "images/voydaIII.png",
            "name" => "Thái Hạo Tầng 3"
        ],
        [
            "class" => "99",
            "img" => "images/voydaIV.png",
            "name" => "Thái Hạo Tầng 4"
        ],
        [
            "class" => "100",
            "img" => "images/voydaV.png",
            "name" => "Thái Hạo Tầng 5"
        ],
        [
            "class" => "101",
            "img" => "images/vimI.png",
            "name" => "Quỷ Vương Tông Tầng 1"
        ],
        [
            "class" => "102",
            "img" => "images/vimII.png",
            "name" => "Quỷ Vương Tông Tầng 2"
        ],
        [
            "class" => "103",
            "img" => "images/vimIII.png",
            "name" => "Quỷ Vương Tông Tầng 3"
        ],
        [
            "class" => "104",
            "img" => "images/hakkanI.png",
            "name" => "hợp hoan phái Tầng 1"
        ],
        [
            "class" => "105",
            "img" => "images/hakkanII.png",
            "name" => "Hợp Hoan Phái Tầng 2"
        ],
        [
            "class" => "106",
            "img" => "images/hakkanIII.png",
            "name" => "Hợp Hoan Phái Tầng 3"
        ],
        [
            "class" => "107",
            "img" => "images/aineI.png",
            "name" => "Thanh Vân Môn Tầng 1"
        ],
        [
            "class" => "108",
            "img" => "images/aineII.png",
            "name" => "Thanh Vân Môn Tầng 2"
        ],
        [
            "class" => "109",
            "img" => "images/aineIII.png",
            "name" => "Thanh Vân Môn Tầng 3"
        ],
        [
            "class" => "110",
            "img" => "images/skayaI.png",
            "name" => "Thiên Âm Tự Tầng 1"
        ],
        [
            "class" => "71",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự Tầng 2"
        ],
        [
            "class" => "72",
            "img" => "images/skayaIII.png",
            "name" => "Thiên Âm Tự Tầng 3"
        ],
        [
            "class" => "73",
            "img" => "images/vimIV.png",
            "name" => "Quỷ Vương Tông Tầng 4"
        ],
        [
            "class" => "74",
            "img" => "images/vimV.png",
            "name" => "Quỷ Vương Tông Tầng 5"
        ],
        [
            "class" => "75",
            "img" => "images/hakkanIV.png",
            "name" => "Hợp Hoan Phái Tầng 4"
        ],
        [
            "class" => "116",
            "img" => "images/hakkanV.png",
            "name" => "Hợp Hoan Phái Tầng 5"
        ],
        [
            "class" => "117",
            "img" => "images/aineIV.png",
            "name" => "Thanh Vân Môn Tầng 4"
        ],
        [
            "class" => "118",
            "img" => "images/aineV.png",
            "name" => "Thanh Vân Môn Tầng 5"
        ],
        [
            "class" => "119",
            "img" => "images/skayaIV.png",
            "name" => "Thiên Âm Tự Tầng 4"
        ],
        [
            "class" => "120",
            "img" => "images/skayaV.png",
            "name" => "Thiên Âm Tự Tầng 5"
        ],
        [
            "class" => "121",
            "img" => "images/vimI.png",
            "name" => "Quỷ Vương Tông Tầng 1"
        ],
        [
            "class" => "122",
            "img" => "images/vimII.png",
            "name" => "Quỷ Vương Tông Tầng 2"
        ],
        [
            "class" => "123",
            "img" => "images/vimIII.png",
            "name" => "Quỷ Vương Tông Tầng 3"
        ],
        [
            "class" => "124",
            "img" => "images/hakkanI.png",
            "name" => "hợp hoan phái Tầng 1"
        ],
        [
            "class" => "125",
            "img" => "images/hakkanII.png",
            "name" => "Hợp Hoan Phái Tầng 2"
        ],
        [
            "class" => "126",
            "img" => "images/hakkanIII.png",
            "name" => "Hợp Hoan Phái Tầng 3"
        ],
        [
            "class" => "127",
            "img" => "images/aineI.png",
            "name" => "Thanh Vân Môn Tầng 1"
        ],
        [
            "class" => "128",
            "img" => "images/aineII.png",
            "name" => "Thanh Vân Môn Tầng 2"
        ],
        [
            "class" => "129",
            "img" => "images/aineIII.png",
            "name" => "Thanh Vân Môn Tầng 3"
        ],
        [
            "class" => "130",
            "img" => "images/skayaI.png",
            "name" => "Thiên Âm Tự Tầng 1"
        ],
        [
            "class" => "131",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự Tầng 2"
        ],
        [
            "class" => "132",
            "img" => "images/skayaIII.png",
            "name" => "Thiên Âm Tự Tầng 3"
        ],
        [
            "class" => "133",
            "img" => "images/vimIV.png",
            "name" => "Quỷ Vương Tông Tầng 4"
        ],
        [
            "class" => "134",
            "img" => "images/vimV.png",
            "name" => "Quỷ Vương Tông Tầng 5"
        ],
        [
            "class" => "135",
            "img" => "images/hakkanIV.png",
            "name" => "Hợp Hoan Phái Tầng 4"
        ],
        [
            "class" => "136",
            "img" => "images/hakkanV.png",
            "name" => "Hợp Hoan Phái Tầng 5"
        ],
        [
            "class" => "137",
            "img" => "images/aineIV.png",
            "name" => "Thanh Vân Môn Tầng 4"
        ],
        [
            "class" => "138",
            "img" => "images/aineV.png",
            "name" => "Thanh Vân Môn Tầng 5"
        ],
        [
            "class" => "139",
            "img" => "images/skayaIV.png",
            "name" => "Thiên Âm Tự Tầng 4"
        ],
        [
            "class" => "140",
            "img" => "images/skayaV.png",
            "name" => "Thiên Âm Tự Tầng 5"
        ],
        [
            "class" => "141",
            "img" => "images/vimI.png",
            "name" => "Quỷ Vương Tông Tầng 1"
        ],
        [
            "class" => "142",
            "img" => "images/vimII.png",
            "name" => "Quỷ Vương Tông Tầng 2"
        ],
        [
            "class" => "143",
            "img" => "images/vimIII.png",
            "name" => "Quỷ Vương Tông Tầng 3"
        ],
        [
            "class" => "144",
            "img" => "images/hakkanI.png",
            "name" => "hợp hoan phái Tầng 1"
        ],
        [
            "class" => "145",
            "img" => "images/hakkanII.png",
            "name" => "Hợp Hoan Phái Tầng 2"
        ],
        [
            "class" => "146",
            "img" => "images/hakkanIII.png",
            "name" => "Hợp Hoan Phái Tầng 3"
        ],
        [
            "class" => "147",
            "img" => "images/aineI.png",
            "name" => "Thanh Vân Môn Tầng 1"
        ],
        [
            "class" => "148",
            "img" => "images/aineII.png",
            "name" => "Thanh Vân Môn Tầng 2"
        ],
        [
            "class" => "149",
            "img" => "images/aineIII.png",
            "name" => "Thanh Vân Môn Tầng 3"
        ],
        [
            "class" => "150",
            "img" => "images/skayaI.png",
            "name" => "Thiên Âm Tự Tầng 1"
        ],
        [
            "class" => "151",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự Tầng 2"
        ],
        [
            "class" => "152",
            "img" => "images/skayaIII.png",
            "name" => "Thiên Âm Tự Tầng 3"
        ],
        [
            "class" => "153",
            "img" => "images/vimIV.png",
            "name" => "Quỷ Vương Tông Tầng 4"
        ],
        [
            "class" => "154",
            "img" => "images/vimV.png",
            "name" => "Quỷ Vương Tông Tầng 5"
        ],
        [
            "class" => "155",
            "img" => "images/hakkanIV.png",
            "name" => "Hợp Hoan Phái Tầng 4"
        ],
        [
            "class" => "156",
            "img" => "images/hakkanV.png",
            "name" => "Hợp Hoan Phái Tầng 5"
        ],
        [
            "class" => "157",
            "img" => "images/aineIV.png",
            "name" => "Thanh Vân Môn Tầng 4"
        ],
        [
            "class" => "158",
            "img" => "images/aineV.png",
            "name" => "Thanh Vân Môn Tầng 5"
        ],
        [
            "class" => "159",
            "img" => "images/skayaIV.png",
            "name" => "Thiên Âm Tự Tầng 4"
        ],
        [
            "class" => "160",
            "img" => "images/skayaV.png",
            "name" => "Thiên Âm Tự Tầng 5"
        ],
        [
            "class" => "161",
            "img" => "images/vimI.png",
            "name" => "Quỷ Vương Tông Tầng 1"
        ],
        [
            "class" => "162",
            "img" => "images/vimII.png",
            "name" => "Quỷ Vương Tông Tầng 2"
        ],
        [
            "class" => "163",
            "img" => "images/vimIII.png",
            "name" => "Quỷ Vương Tông Tầng 3"
        ],
        [
            "class" => "164",
            "img" => "images/hakkanI.png",
            "name" => "hợp hoan phái Tầng 1"
        ],
        [
            "class" => "165",
            "img" => "images/hakkanII.png",
            "name" => "Hợp Hoan Phái Tầng 2"
        ],
        [
            "class" => "166",
            "img" => "images/hakkanIII.png",
            "name" => "Hợp Hoan Phái Tầng 3"
        ],
        [
            "class" => "167",
            "img" => "images/aineI.png",
            "name" => "Thanh Vân Môn Tầng 1"
        ],
        [
            "class" => "168",
            "img" => "images/aineII.png",
            "name" => "Thanh Vân Môn Tầng 2"
        ],
        [
            "class" => "169",
            "img" => "images/aineIII.png",
            "name" => "Thanh Vân Môn Tầng 3"
        ],
        [
            "class" => "170",
            "img" => "images/skayaI.png",
            "name" => "Thiên Âm Tự Tầng 1"
        ],
        [
            "class" => "171",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự Tầng 2"
        ],
        [
            "class" => "172",
            "img" => "images/skayaIII.png",
            "name" => "Thiên Âm Tự Tầng 3"
        ],
        [
            "class" => "173",
            "img" => "images/vimIV.png",
            "name" => "Quỷ Vương Tông Tầng 4"
        ],
        [
            "class" => "174",
            "img" => "images/vimV.png",
            "name" => "Quỷ Vương Tông Tầng 5"
        ],
        [
            "class" => "175",
            "img" => "images/hakkanIV.png",
            "name" => "Hợp Hoan Phái Tầng 4"
        ],
        [
            "class" => "176",
            "img" => "images/hakkanV.png",
            "name" => "Hợp Hoan Phái Tầng 5"
        ],
        [
            "class" => "177",
            "img" => "images/aineIV.png",
            "name" => "Thanh Vân Môn Tầng 4"
        ],
        [
            "class" => "178",
            "img" => "images/aineV.png",
            "name" => "Thanh Vân Môn Tầng 5"
        ],
        [
            "class" => "179",
            "img" => "images/skayaIV.png",
            "name" => "Thiên Âm Tự Tầng 4"
        ],
        [
            "class" => "180",
            "img" => "images/skayaV.png",
            "name" => "Thiên Âm Tự Tầng 5"
        ]
    ];

    public function getClass() {
        $item = collect(self::CLASSES)->firstWhere('class', $this->class);
        return $item["name"];
    }

    public function getImage() {
        $item = collect(self::CLASSES)->firstWhere('class', $this->class);
        return url('') . "/assets/new/" . $item["img"];
    }

}


