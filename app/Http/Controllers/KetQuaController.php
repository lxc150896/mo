<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CcmBiNanDiLen;
use App\CcmBiNanDiXuong;
use App\CcmTrinhSatDiLen;
use App\CcmTrinhSatDiXuong;
use App\OxiBiNanDiLen;
use App\OxiBiNanDiXuong;
use App\OxiTrinhSatDiLen;
use App\OxiTrinhSatDiXuong;

class KetQuaController extends Controller
{
    public function postKetQua(Request $request)
    {
        $value = [
            'gocDoc' => $request->gocDoc,
            'chieuCao' => $request->chieuCao,
            'quangDuong' => $request->quangDuong,
            'diLenXuong' => $request->diLenXuong,
            'vanChuyen' => $request->vanChuyen,
            'coKhoi' => $request->coKhoi,
        ];
        
        $tong = [
            'tongThoiGianDi' => $request->tongThoiGianDi,
            'tongChiPhiOxiDi' => $request->tongChiPhiOxiDi,
            'tongThoiGianVe' => $request->tongThoiGianVe,
            'tongChiPhiOxiVe' => $request->tongChiPhiOxiVe,
        ];
        $caoOxi = $value['chieuCao'];
        $chieuCaoOxi = $this->getChieuCaoNguoc($caoOxi);

        $gocOxi = $value['gocDoc'];
        $gocDocOxi = $this->getGocNguoc($gocOxi);
        $gocDocCcm = $this->getGocXuoi($value['gocDoc']);

        if ($value['vanChuyen'] == 1) {

            $chieuCaoVanToc = $this->getChieuCaoXuoi($value['chieuCao']);

            if ($value['diLenXuong'] == 1) {
                $vanToc = CcmTrinhSatDiLen::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoVanToc]
                ])->first();
                $vanTocNguoc = CcmTrinhSatDiXuong::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoVanToc]
                ])->first();

                $oxiTieuThu = OxiTrinhSatDiLen::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();
                $oxiTieuThuNguoc = OxiTrinhSatDiXuong::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();

                $data = $this->getData($vanToc, $oxiTieuThu, $vanTocNguoc, $oxiTieuThuNguoc, $value['quangDuong'], $value['coKhoi'], $tong, $value);
                return $data;
            } elseif ($value['diLenXuong'] == 2) {
                $vanToc = CcmTrinhSatDiXuong::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoVanToc]
                ])->first();
                $vanTocNguoc = CcmTrinhSatDiLen::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoVanToc]
                ])->first();

                $oxiTieuThu = OxiTrinhSatDiXuong::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();
                $oxiTieuThuNguoc = OxiTrinhSatDiLen::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();

                $data = $this->getData($vanToc, $oxiTieuThu, $vanTocNguoc, $oxiTieuThuNguoc, $value['quangDuong'], $value['coKhoi'], $tong, $value);
                return $data;
            } else {
                return $data = 'Chưa chọn lên dốc hay xuống dốc';
            }
        } elseif ($value['vanChuyen'] == 2) {

            if ($value['diLenXuong'] == 1) {
                $vanToc = CcmBiNanDiLen::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoOxi]
                ])->first();
                $vanTocNguoc = CcmBiNanDiXuong::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoOxi]
                ])->first();

                $oxiTieuThu = OxiBiNanDiLen::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();
                $oxiTieuThuNguoc = OxiBiNanDiXuong::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();

                $data = $this->getData($vanToc, $oxiTieuThu, $vanTocNguoc, $oxiTieuThuNguoc, $value['quangDuong'], $value['coKhoi'], $tong, $value);
                return $data;
            } elseif ($value['diLenXuong'] == 2) {
                $vanToc = CcmBiNanDiXuong::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoOxi]
                ])->first();
                $vanTocNguoc = CcmBiNanDiLen::where([
                    ['goc', '=', $gocDocCcm],
                    ['cao', '=', $chieuCaoOxi]
                ])->first();

                $oxiTieuThu = OxiBiNanDiXuong::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();
                $oxiTieuThuNguoc = OxiBiNanDiLen::where([
                    ['goc', '=', $gocDocOxi],
                    ['cao', '=', $chieuCaoOxi],
                ])->first();

                $data = $this->getData($vanToc, $oxiTieuThu, $vanTocNguoc, $oxiTieuThuNguoc, $value['quangDuong'], $value['coKhoi'], $tong, $value);
                return $data;
            } else {
                return $data = 'Chưa chọn lên dốc hay xuống dốc';
            }
        } else {
            return $data = 'Chưa chọn hình thức vận chuyển';
        }
    }

    public function getData($vanToc, $oxiTieuThu, $vanTocNguoc, $oxiTieuThuNguoc, $quangDuong, $coKhoi, $tong, $value)
    {
        if ($vanToc != null && $oxiTieuThu != null && $vanTocNguoc != null && $oxiTieuThuNguoc != null) {   
            $thoiGianSaiXuoi = (float) ($quangDuong)/(float)($vanToc->vantoc);
            $thoiGianSaiNguoc = (float) ($quangDuong)/(float)($vanTocNguoc->vantoc);

            if ($coKhoi != 1) {
                $thoiGianDungXuoi = $thoiGianSaiXuoi/(float) (1-$coKhoi);
                $chiPhiOxiXuoi = (float) ($oxiTieuThu->vantoc) * $thoiGianDungXuoi;
                $data['thoiGianDungXuoi'] = $thoiGianDungXuoi;
                $data['chiPhiOxiXuoi'] = $chiPhiOxiXuoi;

                $thoiGianDungNguoc = $thoiGianSaiNguoc/(float) (1-$coKhoi);
                $chiPhiOxiNGuoc = (float) ($oxiTieuThuNguoc->vantoc) * $thoiGianDungNguoc;
                $data['thoiGianDungNguoc'] = $thoiGianDungNguoc;
                $data['chiPhiOxiNguoc'] = $chiPhiOxiNGuoc;

                return $this->getKetQua($data, $tong, $value);
            } else {
                $chiPhiOxiXuoi = (float) $oxiTieuThu->vantoc * $thoiGianSaiXuoi;
                $data['thoiGianDungXuoi'] = $thoiGianSaiXuoi;
                $data['chiPhiOxiXuoi'] = $chiPhiOxiXuoi;

                $chiPhiOxiNguoc = (float) $oxiTieuThuNguoc->vantoc * $thoiGianSaiNguoc;
                $data['thoiGianDungNguoc'] = $thoiGianSaiNguoc;
                $data['chiPhiOxiNguoc'] = $chiPhiOxiNguoc;

                return $this->getKetQua($data, $tong, $value);
            }
        } else {
            return $data = 'Góc dốc hoặc chiều cao không tìm thấy trong dữ liệu!';
        }
    }

    public function getKetQua($dataKetQua, $tong, $value)
    {
        $tongThoiGianDi = (float) $tong['tongThoiGianDi'] + (float) $dataKetQua['thoiGianDungXuoi'];
        $tongChiPhiOxiDi = (float) $tong['tongChiPhiOxiDi'] + (float) $dataKetQua['chiPhiOxiXuoi'];
        $tongThoiGianVe = (float) $tong['tongThoiGianVe'] + (float) $dataKetQua['thoiGianDungNguoc'];
        $tongChiPhiOxiVe = (float) $tong['tongChiPhiOxiVe'] + (float) $dataKetQua['chiPhiOxiNguoc'];
        $tongThoiGian = $tongThoiGianDi + $tongThoiGianVe;
        $tongChiPhiOxi = $tongChiPhiOxiDi + $tongChiPhiOxiVe;

        $dataKetQua['thoiGianDungXuoi'] = round($dataKetQua['thoiGianDungXuoi'], 3);
        $dataKetQua['chiPhiOxiXuoi'] = round($dataKetQua['chiPhiOxiXuoi'], 3);
        $dataKetQua['thoiGianDungNguoc'] = round($dataKetQua['thoiGianDungNguoc'], 3);
        $dataKetQua['chiPhiOxiNguoc'] = round($dataKetQua['chiPhiOxiNguoc'], 3);

        $tongThoiGianDi = round($tongThoiGianDi, 3);
        $tongChiPhiOxiDi = round($tongChiPhiOxiDi, 3);
        $tongThoiGianVe = round($tongThoiGianVe, 3);
        $tongChiPhiOxiVe = round($tongChiPhiOxiVe, 3);
        $tongThoiGian = round($tongThoiGian, 3);
        $tongChiPhiOxi = round($tongChiPhiOxi, 3);

        $data = [
            'thoiGianDungXuoi' => $dataKetQua['thoiGianDungXuoi'],
            'chiPhiOxiXuoi' => $dataKetQua['chiPhiOxiXuoi'],
            'thoiGianDungNguoc' => $dataKetQua['thoiGianDungNguoc'],
            'chiPhiOxiNguoc' => $dataKetQua['chiPhiOxiNguoc'],
            'tongThoiGianDi' => $tongThoiGianDi,
            'tongChiPhiOxiDi' => $tongChiPhiOxiDi,
            'tongThoiGianVe' => $tongThoiGianVe,
            'tongChiPhiOxiVe' => $tongChiPhiOxiVe,
            'tongThoiGian' => $tongThoiGian,
            'tongChiPhiOxi' => $tongChiPhiOxi,
            'value' => 1,
        ];

        return array_merge($data, $value);
    }

    public function getChieuCaoXuoi($chieuCao)
    {
        switch ($chieuCao) {
            case ($chieuCao <= 0.6):
            return $chieuCao = 0.6;
            break;
            case ($chieuCao > 0.6 && $chieuCao < 0.8):
            return $chieuCao = 0.6;
            break;
            case ($chieuCao >= 0.8 && $chieuCao < 1.0):
            return $chieuCao = 0.8;
            break;
            case ($chieuCao >= 1.0 && $chieuCao < 1.2):
            return $chieuCao = 1.0;
            break;
            case ($chieuCao >= 1.2 && $chieuCao < 1.4):
            return $chieuCao = 1.2;
            break;
            case ($chieuCao >= 1.4 && $chieuCao < 1.7):
            return $chieuCao = 1.4;
            break;
            case ($chieuCao >= 1.7 && $chieuCao < 2.0):
            return $chieuCao = 1.7;
            break;
            case ($chieuCao >= 2.0):
            return $chieuCao = 2.0;
            break;
            default:
            return $chieuCao;
            break;
        }
    }

    public function getChieuCaoNguoc($chieuCao)
    {
        switch ($chieuCao) {
            case ($chieuCao <= 0.6):
            return $chieuCao = 0.6;
            break;
            case ($chieuCao > 0.6 && $chieuCao < 0.8):
            return $chieuCao = 0.6;
            break;
            case ($chieuCao >= 0.8 && $chieuCao < 1.0):
            return $chieuCao = 0.8;
            break;
            case ($chieuCao >= 1.0 && $chieuCao < 1.2):
            return $chieuCao = 1.0;
            break;
            case ($chieuCao >= 1.2 && $chieuCao < 1.4):
            return $chieuCao = 1.2;
            break;
            case ($chieuCao >= 1.4 && $chieuCao < 1.6):
            return $chieuCao = 1.4;
            break;
            case ($chieuCao >= 1.6 && $chieuCao < 1.8):
            return $chieuCao = 1.6;
            break;
            case ($chieuCao >= 1.8 && $chieuCao < 2.0):
            return $chieuCao = 1.8;
            break;
            case ($chieuCao >= 2.0):
            return $chieuCao = 2.0;
            break;
            default:
            return $chieuCao;
            break;
        }
    }

    public function getGocXuoi($gocDoc)
    {
        switch ($gocDoc) {
            case ($gocDoc <= 0):
            return $gocDoc = 0;
            break;
            case ($gocDoc > 0 && $gocDoc <= 10):
            return $gocDoc = 10;
            break;
            case ($gocDoc > 10 && $gocDoc <= 15):
            return $gocDoc = 15;
            break;
            case ($gocDoc > 15 && $gocDoc <= 20):
            return $gocDoc = 20;
            break;
            case ($gocDoc > 20 && $gocDoc <= 30):
            return $gocDoc = 30;
            break;
            case ($gocDoc > 30 && $gocDoc <= 40):
            return $gocDoc = 40;
            break;
            case ($gocDoc > 40 && $gocDoc <= 70):
            return $gocDoc = 70;
            break;
            case ($gocDoc > 70):
            return $gocDoc = 70;
            break;
            default:
            return $gocDoc;
            break;
        }
    }

    public function getGocNguoc($gocDoc)
    {
        switch ($gocDoc) {
            case ($gocDoc <= 0):
            return $gocDoc = 0;
            break;
            case ($gocDoc > 0 && $gocDoc <= 10):
            return $gocDoc = 10;
            break;
            case ($gocDoc > 10 && $gocDoc <= 15):
            return $gocDoc = 15;
            break;
            case ($gocDoc > 15 && $gocDoc <= 20):
            return $gocDoc = 20;
            break;
            case ($gocDoc > 20 && $gocDoc <= 30):
            return $gocDoc = 30;
            break;
            case ($gocDoc > 30 && $gocDoc <= 40):
            return $gocDoc = 40;
            break;
            case ($gocDoc > 40 && $gocDoc <= 50):
            return $gocDoc = 50;
            break;
            case ($gocDoc > 50 && $gocDoc <= 60):
            return $gocDoc = 60;
            break;
            case ($gocDoc > 60 && $gocDoc <= 70):
            return $gocDoc = 70;
            break;
            case ($gocDoc > 70):
            return $gocDoc = 70;
            break;
            default:
            return $gocDoc;
            break;
        }
    }
}
