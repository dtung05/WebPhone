

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa sản phẩm</title>
</head>
<body>
<div style="flex:1;margin-left:40px" class="dangky">
        <h2 style="text-align:center">Sửa sản phẩm</h2>
            <form action="<?= _WEB_ROOT ?>/Product/UpdateProduct" method="post" style="display:flex;gap:40px">
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
</div>
</body>
</html>
