let viTri = 0;
function hienThiAnh() {
  const anh = document.getElementById("anh-truot");
  anh.style.transform = `translateX(${-viTri * 400}px)`; 
}

function anhSau() {
  viTri = (viTri + 1) % 5;
  hienThiAnh();
}

function anhTruoc() {
  viTri = (viTri - 1 + 5) % 5;
  hienThiAnh();
}
