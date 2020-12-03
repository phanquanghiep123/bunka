@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$_PAGETITLE}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>Tiêu chuẩn của BV</h2>
                    <hr/>
                    <h3>Những quy định cơ bản của BX Bunka Việt Nam</h3>
                    <ul>
                        <li>Phê duyệt（Một trong những người sau ký  tên）
                            <ul>
                                <li>Giám đốc Ｄ</li>
                                <li>Trưởng chi nhánhＳ</li>
                                <li>Manager Ｍ</li>
                                <li>Trưởng nhóm Ｒ</li>
                            </ul>
                        </li>
                        <li>Quy trình của giấy tờ
                            <ul>
                                <li>Nhân viên kinh doanh～Trưởng chi nhánh～Hành chính</li>
                                <li>Nhân viên kinh doanh～Trưởng chi nhánh～Giám đốc～Hành chính</li>
                                <li>Nhân viên kinh doanh～Trưởng chi nhánh～Giám đốc～Hành chính</li>
                            </ul>
                        </li>

                    </ul>
                    <hr>
                    <table cellspacing="0" border="0">
                        <tbody><tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="5" height="95" align="center" valign="middle"><font color="#000000">Tiêu chuẩn về báo giá</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xuất trình báo giá đầu tiên</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">file PDF, báo giá Excel chi tiết</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｒ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xuất trình báo giá trong giai đoạn đàm phán giá</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">file PDF, báo giá Excel chi tiết</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xuất trình báo giá để ký hợp đồng</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">file PDF, báo giá Excel chi tiết</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xuất trình báo giá của hợp đồng phát sinh</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">file PDF, báo giá Excel chi tiết</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xuất trình báo giá tăng giảm khối lượng</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">file PDF, báo giá Excel chi tiết</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="4" height="76" align="center" valign="middle"><font color="#000000">Tiêu chuẩn về trúng thầu</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">Đăng ký trúng thầu（đăng lý sau khi có hợp đồng và khách hàng ký phê duyệt)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">・Công trình đã xin giảm giá sản xuất theo số lượng của mà vẫn lỗ( trình phiếu trúng thầu, mục tiêu cắt giảm giá, sau khi được phê duyệt mới đăng ký trúng thầu.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">・Công trình có số  tiền ký hợp đồng trên 2,000,000,000 NVĐ（trình phiếu trúng thầu, mục tiêu cắt giảm giá, sau khi được phê duyệt mới đăng ký trúng thầu.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Hạn đăng ký trúng thầu vào cuối tháng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="6" height="114" align="center" valign="middle"><font color="#000000">Tiêu chuẩn hợp đồng</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Với khách hàng giao dịch lần đầu và có số tiền giao dịch lớn, cần nhờ công ty tư vấn xúc tiến lập hợp đồng và dịch hợp đồng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Đối với khách hàng giao dịch lần đầu </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">     -Cần giấy chứng nhận đăng ký kinh doanh,  Giấy chứng nhận đăng ký thuế , Địa chỉ giao dịch,  thông tin khách hàng ( Theo Form mẫu “ BV Customer information form”)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">     -Về hợp đồng:  Sử dụng Form mẫu Công ty, </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">       Kinh doanh cần check kỹ các điều khoản trong Hợp đồng,  báo cáo lên Trưởng phòng kinh doanh xem có đồng ý giao dịch ký hợp đồng hay không.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">       Thêm điều khoản phạt chậm thanh toán không đúng hạn vào trong hợp đồng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="5" height="95" align="center" valign="middle"><font color="#000000">Tiêu chuẩn đặt hàng</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Nhận đơn đặt hàng trước 10 giờ sáng hàng ngày, với những công trình có thời gian thi công ngắn và công trình gấp cần liên lạc trực tiếp với nhà máy.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Thời gian sản xuất tiêu chuẩn là 15 ngày, nhưng với hàng đặc biệt thì áp dụng số ngày sản xuất khác ( cần phải thảo luận riêng)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">Chia riêng sản phẩm để đặt hàng（Theo như bảng mã sản phẩm）</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Trường hợp thay đổi đặt hàng hay hủy đặt hàng thì phải làm phiếu yêu cầu thay đổi.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">Những công trình đã ghi trong bảng kế hoạch xuất hàng thì sẽ không thay đổi trước ngày xuất hàng 3 ngày （nếu cần thay đổi thì phải gửi phiếu yêu cầu thay đổi xuất hàng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="18" height="342" align="center" valign="middle"><font color="#000000">Tiêu chuẩn hoàn công</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Hoàn công công trình khi có đầy đủ hợp đồng và biên bản hoàn công.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Hạn làm hoàn công là cuối tháng</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Hoàn công toàn bộ công trình khi đã lắp đặt xong ( không hoàn công khi công trình chưa kết thúc hết)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">（Nhưng khi thời gian thi công của công trình bị kéo dài ra quá nhiều so với dự kiến thì phải thảo luận, xem xét để đưa ra các điều kiện để làm hoàn công</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000"> Những giấy tờ cần để làm hoàn công:</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">-Phiếu trúng thầu có đầy đủ chữ ký Người phụ trách kinh doanh, Trưởng phòng kinh doanh</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">-Hợp đồng, Phụ lục HĐ ( Hoặc Đơn đặt hàng ) có chữ ký, dấu của hai bên. </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">- Giấy tờ hoàn công theo hợp đồng quy định hoặc theo yêu cầu khách hàng. </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">     Giấy tờ hoàn công dùng form của Bunka có đầy đủ chữ ký của hai bên ( gồm: Biên bản giao hàng, biên bản nghiệm thu, biên bản giao chìa khóa)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">     Giấy tờ hoàn công dùng form của khách hàng ,đầy đủ theo yêu cầu khách hàng , có đầy đủ chữ ký của hai bên: (Ví dụ: Biên bản nghiệm thu bàn giao đưa vào sử dụng, Bản quyết toán khối lượng tăng, giảm…)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">-Biên bản hoàn công đối với nhà thầu lắp đặt</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">-Hợp đồng, báo giá lắp đặt bản cuối ( có đầy đủ chữ ký của hai bên) </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">êLưu ý:  </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">Thời gian:　</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Ngày làm việc đầu tiên Kế toán báo cáo với Trưởng phòng hành chính Danh sách những công trình nghiệm thu trong tháng. </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000"> Đối với những công trình thực tế đã hoàn thành trong tháng nhưng đến thời hạn báo cáo vẫn chưa tập hợp đủ chứng từ thì sẽ để ghi nhận doanh thu vào tháng kế tiếp sau khi nhận được  đầy đủ chứng từ hoặc tuỳ thuộc vào quyết định của Trưởng phòng hành chính, giám đốc</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="5" height="95" align="center" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Tiêu chuẩn về yêu cầu thanh toán</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Đối với đơn đặt hàng dưới 30 trđ yêu cầu khách hàng chuyển khoản trước khi đặt hàng hoặc giao hàng ( áp dụng cho khách hàng cũ và mới giao dịch)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Nhận thanh toán tạm ứng rồi mới đặt hàng xuống nhà máy.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Nhân thanh toán lần 2 sau khi giao hàng -&gt; Sau khi thu hồi 80% giá trị hợp đồng Kinh doanh mới cho lắp đặt</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Nhân thanh toán lần cuối sau khi nghiệm thu -&gt; Khi nhận được tiền lần cuối mới giao chìa khóa…</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Sau khi công trình đi vào hoàn công kinh doanh cần xác nhận lịch thanh toán với khách hàng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="7" height="133" align="center" valign="middle"><font color="#000000">Tiêu chuẩn về các loại đơn đề nghị</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Đơn đề nghị</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Đề nghị chi phí tiếp khách</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Ｓ・Ｍ・Ｂ・Ｋ・Ｄ</font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xin mua linh phụ kiện</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xin mua hàng từ nhà cung cấp</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xin giảm giá đặc biệt</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Xin giảm giá sản xuất theo số lượng cửa</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Đề nghị chi phí hoa hồng</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="4" height="76" align="center" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Tiêu chuẩn về lắp đặt (Hợp đồng cơ bản ・Ký kết hợp đồng trước)</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Nguyên  tắc là phải ký hợp đồng với công ty lắp đặt trước.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">（Những công trình không có hợp đồng lắp đặt thì không được lắp đặt)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Ký hợp đồng lắp đặt với công ty lắp đặt trên cơ sở đã hiểu rõ về các tiêu chuẩn, quy định về lắp đặt.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Với những claim của khách hàng , hay xảy ra mất mát đồ tại công trình thì hai bên cùng làm việc để phân chia, chia sẻ trách nhiệm </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="4" height="76" align="center" valign="middle"><font color="#000000">Tiêu chuẩn về vận chuyển</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font face="DejaVu Sans Mono" color="#000000">Hành chính sẽ tính toán chi phí vận chuyển ( và công bố phí vận chuyển trên cơ sở giảm giá thành）</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Phí đóng gói, bốc hàng bẳng 20% chi phí vận chuyển.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Kỹ sư lắp đặt, công nhân lắp đặt không được vào nhà máy lấy hàng.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font face="DejaVu Sans Mono" color="#000000">（Trường hợp bắt buộc lấy hàng thì  khi phải tiến hành dưới sự chứng kiến của người Nhật, hoặc người quản lý của nhà máy.）</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="4" height="77" align="center" valign="middle"><font color="#000000">Tăng độ chính xác của trúng thầu, dự kiến trúng thầu, hoàn công</font></td>
                            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Việc kiểm tra bảng Số dư trúng thầu (thay đổi nội dung, thay đổi tháng hoàn công) phải được thực hiện hàng ngày, check lại lần cuối bảng Số dư trúng thầu cuối tháng trong ba ngày làm việc đầu tiên của tháng tiếp theo.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">Khi muốn thay đổi số liệu trong bảng Số dư trúng thầu phải báo cho hành chính. ( Manager, trưởng chi nhánh phải check kỹ để không xảy ra sai sót về số liệu)</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff; border-left: 1px solid #000000" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#000000">Về dự kiến trúng thầu, hoàn công, từng nhân viên kinh doanh phải tính toán số tiền trúng thầu, hoàn công của tháng đó đưa vào bảng sao cho cân bằng, bù trừ cho nhau, sau </font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign="middle"><font color="#000000">đó, các nhóm, các chi nhánh tự tổng hợp dự kiến của cả nhóm, chi nhánh.</font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"><br></font></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript">
        $(document).on("click","table input.onchangevalue",function(){
            var _this = $(this);
            var v = _this.parent().find(".apply").val() == 0  ? 1 : 0;
            _this.parent().find(".apply").val(v);
        });
    </script>
@stop
