<template>
    <div class="container">
     <div class="row">
        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
            <form id="contactform" name="contact">
                <p class="note"><span class="req">*</span> Nhập số liệu quãng đương A{{ indexTop }}->B{{ indexTop }}</p>
                <div class="row">
                    <label for="name">Góc Dốc<span class="req">*</span></label>
                    <input type="number" v-model="gocDoc" id="name" class="txt" tabindex="1" placeholder="G" autocomplete="off">
                </div>

                <div class="row">
                    <label for="email">Chiều Cao (h)<span class="req">*</span></label>
                    <input type="number" v-model="chieuCao" id="email" class="txt" tabindex="2" placeholder="H" autocomplete="off">
                </div>

                <div class="row">
                    <label for="subject">Quãng Đường (l) <span class="req">*</span></label>
                    <input type="number" v-model="quangDuong" id="subject" class="txt" tabindex="3" placeholder="L" autocomplete="off">
                </div>

                <div class="row">
                    <label for="subject">Chọn Độ Khói<span class="req">*</span></label>
                    <span class="custom-dropdown big">
                        <select v-model="coKhoi">
                            <option value="1">Không có khói</option>
                            <option value="0.3">Có khói (0,3)</option>  
                            <option value="0.4">Có khói (0,4)</option>
                            <option value="0.5">Có khói (0,5)</option>
                        </select>
                    </span>
                </div>
                <div class="row">
                    <label for="subject">Hình Thức Vận Chuyển<span class="req">*</span></label>
                    <span class="custom-dropdown big">
                        <select v-model="vanChuyen">
                            <option value="1">Khi tiến hàng trinh sát</option>
                            <option value="2">Khi vận chuyển người bị nạn</option>  
                        </select>
                    </span>
                </div>

                <div class="row">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="selector" value="1" v-model="diLenXuong">
                        <label class="custom-control-label" for="defaultInline1">Đi Lên</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2" name="selector" value="2" v-model="diLenXuong">
                        <label class="custom-control-label" for="defaultInline2">Đi Xuống</label>
                    </div>
                </div>

                <div class="center">
                    <button type="button" class="btn" @click="tinhKetQua()">Kết quả</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
            <div v-if="ketQuas" class="row">
                <div class="ketQua" v-for="(ketQua, index) in ketQuas">
                    <h4>Quãng đường A{{ index + 1 }}->B{{ index +1 }}</h4>
                    <p>Góc Dốc: {{ ketQua.gocDoc }} (°)</p>
                    <p>Chiều Cao: {{ ketQua.chieuCao }} (m)</p>
                    <p>Quãng Đường: {{ ketQua.quangDuong }} (m)</p>
                    <p v-if="ketQua.coKhoi == 1">Độ Khói: Không có khói</p>
                    <p v-else-if="ketQua.coKhoi == 0.3">Độ Khói: 0.3</p>
                    <p v-else-if="ketQua.coKhoi == 0.4">Độ Khói: 0.4</p>
                    <p v-else>Độ Khói: 0.5</p>
                    <p v-if="ketQua.vanChuyen == 1">Khi tiến hàng trinh sát</p>
                    <p v-else>Khi vận chuyển người bị nạn</p>
                    <p v-if="ketQua.diLenXuong == 1">Hình thức đi: Đi Lên</p>
                    <p v-else>Hình thức đi: Đi Xuống</p>

                    <p>Thời gian đi: {{ ketQua.thoiGianDungXuoi }} (phút)</p>
                    <p>Chi phí oxi đi: {{ ketQua.chiPhiOxiXuoi }} (lít)</p>
                    <p>thời gian về: {{ ketQua.thoiGianDungNguoc }} (phút)</p>
                    <p>Chi phí oxi về: {{ ketQua.chiPhiOxiNguoc }} (lít)</p>
                </div>
            </div>
            <div class="row">
                <div v-if="tongThoiGianDi != 0">
                    <h3>Quãng đường A->B</h3>
                    <h4>Tổng thời gian đi: {{ tongThoiGianDi }} (phút)</h4>
                    <h4>Tổng chi phí oxi đi: {{ tongChiPhiOxiDi }} (lít)</h4>
                    <h4>Tổng thời gian về: {{ tongThoiGianVe }} (phút)</h4>
                    <h4>Tổng chi phí oxi về: {{ tongChiPhiOxiVe }} (lít)</h4>
                    <h4>Tổng thời gian: {{ tongThoiGian }} (phút)</h4>
                    <h4 v-if="tongChiPhiOxi >= 400"><p>Tổng chi phí oxi: {{ tongChiPhiOxi }} (lít)</p><div class="alert alert-danger">
                      <strong>Chú ý!</strong> Lượng oxi đã vượt quá giới hạn cho phép là 400 lít.
                  </div></h4>
                  <h4 v-else>Tổng chi phí oxi: {{ tongChiPhiOxi }} (lít)</h4>
              </div>
              <div class="message"><h4>{{ thongBaoLoi }}</h4></div>
          </div>
          <div class="center">
            <button type="button" class="btnR" @click="reset()">Khôi phục ban đầu</button>
        </div>
    </div>
</div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                gocDoc: '',
                chieuCao: '',
                quangDuong: '',
                diLenXuong: '',
                vanChuyen: '',
                coKhoi:'',
                thongBaoLoi: '',
                ketQuas: [],
                indexTop: 1,
                tongThoiGianDi: 0,
                tongChiPhiOxiDi: 0,
                tongThoiGianVe: 0,
                tongChiPhiOxiVe: 0,
                tongThoiGian: 0,
                tongChiPhiOxi: 0,
            }
        },
        methods: {
            tinhKetQua() {
                if (this.gocDoc == '' || this.chieuCao == '' || this.quangDuong == '' || this.diLenXuong == '' || this.vanChuyen == '' || this.coKhoi == '') {
                    this.thongBaoLoi = 'Bạn không được để trống một trường nào!'
                } else {
                    axios.post('/ketqua', {
                        gocDoc: this.gocDoc,
                        chieuCao: this.chieuCao,
                        quangDuong: this.quangDuong,
                        diLenXuong: this.diLenXuong,
                        vanChuyen: this.vanChuyen,
                        coKhoi: this.coKhoi,
                        tongThoiGianDi: this.tongThoiGianDi,
                        tongChiPhiOxiDi: this.tongChiPhiOxiDi,
                        tongThoiGianVe: this.tongThoiGianVe,
                        tongChiPhiOxiVe: this.tongChiPhiOxiVe,
                    })
                    .then((response) => {
                        if (response.data.value == 1) {
                            this.thongBaoLoi = '';
                            this.indexTop = this.indexTop + 1;
                            this.ketQuas.push(response.data);
                            this.tongThoiGianDi = response.data.tongThoiGianDi;
                            this.tongChiPhiOxiDi = response.data.tongChiPhiOxiDi;
                            this.tongThoiGianVe = response.data.tongThoiGianVe;
                            this.tongChiPhiOxiVe = response.data.tongChiPhiOxiVe;
                            this.tongThoiGian = response.data.tongThoiGian;
                            this.tongChiPhiOxi = response.data.tongChiPhiOxi;
                            if (this.tongChiPhiOxi >= 400)
                            {
                                alert('Lượng oxi đã vượt quá giới hạn cho phép')
                            }
                        } else {
                            this.thongBaoLoi = response.data;
                        }
                    });
                }
            },
            reset() {
                this.indexTop = 1;
                this.thongBaoLoi = '';
                this.ketQuas = [];
                this.tongThoiGianDi = 0;
                this.tongChiPhiOxiDi = 0;
                this.tongThoiGianVe = 0;
                this.tongChiPhiOxiVe = 0;
            }
        }
    }
</script>
