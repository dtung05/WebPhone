
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý sản phẩm</title>
</head>
<body >
 <hr>
<?php 
if(empty($product) && empty($detailproduct)){ ?>
    <div style="flex:1;margin-left:40px" class="dangky">
        <h2 style="text-align:center">Nhập thêm sản phẩm lên web</h2>
            <form action="<?= _WEB_ROOT ?>/Product/addProduct" method="post" style="display:flex;gap:40px">
            <!-- Thông tin sản phẩm -->
            <div style="width:40%">
                <legend >Sản phẩm</legend>
                <label for="masp">Mã sản phẩm</label>
                <input type="text" name="masp" autofocus="masp" required />

                <label for="tensp">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" required/>

                <label for="gia">Giá sản phẩm</label>
                <input type="text" name="gia" id="gia" required/>

                <label for="mota">Ảnh mô tả</label>
                <textarea name="mota" id="mota" required></textarea>
                <div style = "display:flex; gap:25px;margin-top:15px">
                    <div style="flex:1">
                        <label for="soluong">Số lượng</label>
                        <input type="number" name="soluong" id="soluong" required/>
                    </div>
                    <div style="flex:1">
                        <label for="danhmuc_id">Mã danh mục</label>
                        <input type="text" name="danhmuc_id" id="danhmuc_id" required/>
                    </div>
                </div>  
            </div>
            <!-- Thông số sản phẩm -->
            <div style="flex:1;margin-right:20px">
                <legend>Thông số kỹ thuật</legend>
                <label for="manhinh">Màn hình</label>
                <input type="text" name="manhinh" id="manhinh">
                <label for="hedieuhanh">Hệ điều hành</label>
                <input type="text" name="hedieuhanh" id="hedieuhanh">
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                        <label for="camarasau">Camera sau</label>
                        <input type="text" name="camarasau" id="camarasau">
                    </div>
                    <div style="flex: 1;">
                        <label for="camaratruoc">Camera trước</label>
                        <input type="text" name="camaratruoc" id="camaratruoc">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu">
                    </div>
                    <div style="flex: 1;">
                        <label for="ram">RAM</label>
                        <input type="text" name="ram" id="ram">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="dungluongpin">Dung lượng pin</label>
                        <input type="text" name="dungluongpin" id="dungluongpin">
                    </div>
                    <div style="flex: 1;">
                       <label for="thesim">Thẻ SIM</label>
                        <input type="text" name="thesim" id="thesim">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                          <label for="thietke">Thiết kế</label>
                            <input type="text" name="thietke" id="thietke">
                    </div>
                    <div style="flex: 1;">
                       <p style="margin:10px 0 0 0; font-size:14px; color:gray;">
                            Kiểm tra lại thông tin trước khi thêm.</p>
                        <div style="display:flex; gap:10px; align-items:center;">
                            <button name="themsp"style = "margin-top:0px">Thêm sản phẩm</button>
                        </div> 
                    </div>
                </div>
            </div>
        </form>
<?php }else{ ?>
<div style="flex:1;margin-left:40px" class="dangky">
        <h2 style="text-align:center">Nhập thêm sản phẩm lên web</h2>
            <form action="<?= _WEB_ROOT ?>/Product/addProduct" method="post" style="display:flex;gap:40px">
            <!-- Thông tin sản phẩm -->
            <div style="width:40%">
                <legend >Sản phẩm</legend>
                <label for="masp">Mã sản phẩm</label>
                <input type="text" name="masp" autofocus="masp" required value="<?= $product['masp']; ?>"/>

                <label for="tensp">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" required value="<?= $product['tensp']; ?>" />

                <label for="gia">Giá sản phẩm</label>
                <input type="text" name="gia" id="gia" required value="<?= $product['gia']; ?>" />

                <label for="mota">Ảnh mô tả</label>
                <textarea name="mota" id="mota" required><?= $product['mota'] ?></textarea>
                <div style = "display:flex; gap:25px;margin-top:15px">
                    <div style="flex:1">
                        <label for="soluong">Số lượng</label>
                        <input type="number" name="soluong" id="soluong" required value="<?= $product['soluong']; ?>"  />
                    </div>
                    <div style="flex:1">
                        <label for="danhmuc_id">Mã danh mục</label>
                        <input type="text" name="danhmuc_id" id="danhmuc_id" required value="<?= $product['danhmuc_id']; ?>" />
                    </div>
                </div>  
            </div>
            <!-- Thông số sản phẩm -->
            <div style="flex:1;margin-right:20px">
                <legend>Thông số kỹ thuật</legend>
                <label for="manhinh">Màn hình</label>
                <input type="text" name="manhinh" id="manhinh" value="<?= $detailproduct['manhinh']; ?>" >
                <label for="hedieuhanh">Hệ điều hành</label>
                <input type="text" name="hedieuhanh" id="hedieuhanh" value="<?= $detailproduct['hedieuhanh']; ?>" >
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                        <label for="camarasau">Camera sau</label>
                        <input type="text" name="camarasau" id="camarasau" value="<?= $detailproduct['camarasau']; ?>">
                    </div>
                    <div style="flex: 1;">
                        <label for="camaratruoc">Camera trước</label>
                        <input type="text" name="camaratruoc" id="camaratruoc" value="<?= $detailproduct['camaratruoc']; ?>"> 
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu" value="<?= $detailproduct['cpu']; ?>">
                    </div>
                    <div style="flex: 1;">
                        <label for="ram">RAM</label>
                        <input type="text" name="ram" id="ram" value="<?= $detailproduct['ram']; ?>">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="dungluongpin">Dung lượng pin</label>
                        <input type="text" name="dungluongpin" id="dungluongpin" value="<?= $detailproduct['dungluongpin']; ?>">
                    </div>
                    <div style="flex: 1;">
                       <label for="thesim">Thẻ SIM</label>
                        <input type="text" name="thesim" id="thesim" value="<?= $detailproduct['thesim']; ?>">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                          <label for="thietke">Thiết kế</label>
                            <input type="text" name="thietke" id="thietke" value="<?= $detailproduct['thietke']; ?>">
                    </div>
                    <div style="flex: 1;">
                       <p style="margin:10px 0 0 0; font-size:14px; color:gray;">
                        Kiểm tra lại thông tin trước khi thêm.</p>
                        <button name="themsp"style = "margin-top:0px">Thêm sản phẩm</button>
                    </div>
                </div>
            </div>
        </form>
<?php }if (isset($video) && isset($memory) && isset($img)){ ?>
                <h2>Thông số phụ</h2>
                <div style="width:97%;  gap:40px">
                   
                    <form action="<?= _WEB_ROOT ?>/Product/addDetailProduct" method="post" style="display:flex; gap:30px"> 
                        <!-- link ảnh url  -->
                        <div style="flex:1">
                            <legend>Hình ảnh sản phẩm </legend><br>
                            <label for="masp">Mã sản phẩm</label>
                            <input type="text" name="masp" id="masp" required placeholder="Nhập vào mã sản phẩm." value="<?= $masp; ?>" >
                            <label for="url">Đường dẫn ảnh (URL)</label>
                            <input type="text" name="img[]" id="img[]" required placeholder="Mã url 1" value="<?= $img[0]; ?>" ><br><br>
                            <div style="display:flex;gap:10px">
                                <input type="text" name="img[]" id="img2" required placeholder="Mã url 2" style="flex:1" value="<?= $img[1]; ?>" >
                                <input type="text" name="img[]" id="img3" required placeholder="Mã url 3" style="flex:1" value="<?= $img[2]; ?>" >
                            </div><br>
                            <div style="width:100%;display:flex;gap:10px">
                                <input type="text" name="img[]" id="img4" required placeholder="Mã url 4" value="<?= $img[3]; ?>" >
                                <input type="text" name="img[]" id="img5" required placeholder="Mã url 5" value="<?= $img[4]; ?>" >
                            </div>
                        </div>
                        <!-- Link video đánh giá + Bộ nhớ  -->
                        <div style="flex:2">
                            <legend>Video đánh giá + Bộ nhớ + Giá tiền</legend><br>
                            <div style="width:100%; display:flex;gap:30px">
                                <!-- Link video đánh giá -->
                                <div style="flex: 1;">
                                    <label for="url">Đường dẫn video (URL)</label>
                                    <input type="text" name="video[]" id="video1" required placeholder="Link video 1" value="<?= $video[0]; ?>" >
                                    <label for="">Đường dẫn 2</label>
                                    <input type="text" name="video[]" id="video2" required placeholder="Link video 2" value="<?= $video[1]; ?>" ><br><br>
                                    <input type="text" name="video[]" id="video3" required placeholder="Link video 3" value="<?= $video[2]; ?>" ><br>
                                </div>
                                <!-- Link bộ nhớ sản phẩm -->
                               <div style="flex:1">
                                  
                                    <div style="display:flex;gap:7%">
                                        <div style="width:44.5%">
                                            <label for="bonho">Bộ nhớ</label>
                                            <input type="text" name="memory[0][bonho]" id="bonho1" required placeholder="VD: 64GB" value="<?= $memory[0]['bonho']; ?>" >
                                        </div>
                                         <div style="width:44%" >
                                            <label for="giathanh">Giá thành</label>
                                            <input type="number" name="memory[0][giathanh]" id="giathanh1" required placeholder="Giá tiền..." value="<?= $memory[0]['giathanh']; ?>" >
                                        </div>
                                    </div><label for="">Bộ nhớ</label>
                                    <div style="display:flex;gap:10px">                   
                                            <input type="text" name="memory[1][bonho]" id="bonho2" required placeholder="VD: 128GB" value="<?= $memory[1]['bonho']; ?>" >
                                            <input type="number" name="memory[1][giathanh]" id="giathanh2" required placeholder="Giá tiền..." value="<?= $memory[1]['giathanh']; ?>" >
                                    </div><br>
                                    <div style="display:flex;gap:10px">
                                            <input type="text" name="memory[2][bonho]" id="bonho3" required placeholder="VD: 512GB" value="<?= $memory[2]['bonho']; ?>" >                    
                                            <input type="number" name="memory[2][giathanh]" id="giathanh3" required placeholder="Giá tiền..." value="<?= $memory[2]['giathanh']; ?>" >
                                    </div>
                               </div>                        
                            </div>
                            <input type="submit" value="Thêm thông tin" name="thongtin">
                        </div>
                    </form> 
                </div>
            <?php } else{ ?>
                 <h2>Thông số phụ</h2>
                <div style="width:97%;  gap:40px">
                   
                    <form action="<?= _WEB_ROOT ?>/Product/addDetailProduct" method="post" style="display:flex; gap:30px"> 
                        <!-- link ảnh url  -->
                        <div style="flex:1">
                            <legend>Hình ảnh sản phẩm </legend><br>
                            <label for="masp">Mã sản phẩm</label>
                            <input type="text" name="masp" id="masp" required placeholder="Nhập vào mã sản phẩm.">
                            <label for="url">Đường dẫn ảnh (URL)</label>
                            <input type="text" name="img[]" id="img[]" required placeholder="Mã url 1"><br><br>
                            <div style="display:flex;gap:10px">
                                <input type="text" name="img[]" id="img2" required placeholder="Mã url 2" style="flex:1">
                                <input type="text" name="img[]" id="img3" required placeholder="Mã url 3" style="flex:1">
                            </div><br>
                            <div style="width:100%;display:flex;gap:10px">
                                <input type="text" name="img[]" id="img4" required placeholder="Mã url 4">
                                <input type="text" name="img[]" id="img5" required placeholder="Mã url 5">
                            </div>
                        </div>
                        <!-- Link video đánh giá + Bộ nhớ  -->
                        <div style="flex:2">
                            <legend>Video đánh giá + Bộ nhớ + Giá tiền</legend><br>
                            <div style="width:100%; display:flex;gap:30px">
                                <!-- Link video đánh giá -->
                                <div style="flex: 1;">
                                    <label for="url">Đường dẫn video (URL)</label>
                                    <input type="text" name="video[]" id="video1" required placeholder="Link video 1">
                                    <label for="">Đường dẫn 2</label>
                                    <input type="text" name="video[]" id="video2" required placeholder="Link video 2"><br><br>
                                    <input type="text" name="video[]" id="video3" required placeholder="Link video 3"><br>
                                </div>
                                <!-- Link bộ nhớ sản phẩm -->
                               <div style="flex:1">
                                  
                                    <div style="display:flex;gap:7%">
                                        <div style="width:44.5%">
                                            <label for="bonho">Bộ nhớ</label>
                                            <input type="text" name="memory[1][bonho]" id="bonho1" required placeholder="VD: 64GB">
                                        </div>
                                         <div style="width:44%" >
                                            <label for="giathanh">Giá thành</label>
                                            <input type="number" name="memory[1][giathanh]" id="giathanh1" required placeholder="Giá tiền...">
                                        </div>
                                    </div><label for="">Bộ nhớ</label>
                                    <div style="display:flex;gap:10px">                   
                                            <input type="text" name="memory[2][bonho]" id="bonho2" required placeholder="VD: 128GB">
                                            <input type="number" name="memory[2][giathanh]" id="giathanh2" required placeholder="Giá tiền...">
                                    </div><br>
                                    <div style="display:flex;gap:10px">
                                            <input type="text" name="memory[3][bonho]" id="bonho3" required placeholder="VD: 512GB">                    
                                            <input type="number" name="memory[3][giathanh]" id="giathanh3" required placeholder="Giá tiền...">
                                    </div>
                               </div>                        
                            </div>
                            <input type="submit" value="Thêm thông tin" name="thongtin">
                        </div>
                    </form> 
                </div>
            <?php } ?>
            </div>
    </div>
</div>
</body>
</html>
