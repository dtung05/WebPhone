
<link rel="stylesheet" href="/Assets/css/head_foot.css">
<style>
  #openChat {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #773434ff;
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 22px;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }

    #chatBox {
      display: none;
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 280px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      overflow: hidden;
      font-family: Arial, sans-serif;
    }

    #chatHeader {
      background: #d4575dff;
      color: #fff;
      padding: 10px;
      text-align: center;
      font-weight: bold;
    }

    #chatMessages {
      padding: 10px;
      font-size: 14px;
    }

    .msg {
      margin: 5px 0;
      padding: 8px;
      border-radius: 5px;
      max-width: 80%;
    }

    .bot {
      background: #f1f1f1;
    }

    .user {
      background: #f7f5f5ff;
      color: #0c0c0cff;
      margin-left: auto;
      text-align: right;
    }

    #chatInput {
      display: flex;
      border-top: 1px solid #ddd;
    }

    #chatInput input {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
    }

    #chatInput button {
      background: #fa2323ff;
      color: white;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
    }
</style>
<body>
    <!-- chat box -->
     <button id="openChat">💬</button>

<div id="chatBox">
  <div id="chatHeader">Chat Hỗ Trợ</div>
  <div id="chatMessages">
    <div class="msg bot">Xin chào! Bạn cần hỗ trợ gì?</div>
  </div>
  <div id="chatInput">
    <input type="text" id="userInput" placeholder="Nhập tin nhắn...">
    <button onclick="sendMessage()">Gửi</button>
  </div>
</div>


    <DIV style="width: 100%; background: #1a1a1a; margin: 0;">


<footer class="footer">
  <div class="footer-container">

    <div class="footer-col">
      <h2 class="footer-logo">DiDongViet</h2>
      <p>
        DiDongViet chuyên cung cấp điện thoại chính hãng, phụ kiện chất lượng cao, 
        cam kết giá tốt và dịch vụ uy tín hàng đầu Việt Nam.
      </p>
    </div>

    <div class="footer-col">
      <h3>Liên hệ</h3>
      <p>📍 31 Dịch Vọng Hậu,Cầu Giấy, Hà Nội</p>
      <p>📞 0909 123 456</p>
      <p>✉️ support@didongviet.vn</p>
      <p>🕒 8:00 - 21:00 (T2 - CN)</p>
    </div>

    <div class="footer-col">
      <h3>Thành viên nhóm</h3>
      <ul>
        <li><a href="#">Vũ Đức Tùng</a></li>
        <li><a href="#">Ngô Hồng Quân</a></li>
        <li><a href="#">Đào Nhật Tân</a></li>
       
      </ul>
    </div>

    <div class="footer-col">
      <h3>Google map</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.01766925966!2d105.7870257!3d21.031979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4be8d6409f%3A0x84085138006934d9!2zMlFKUCtNUVcsIDMxIFAuIEThu4tjaCBW4buNbmcgSOG6rXUsIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1769013969592!5m2!1svi!2s"
         width="250" height="200" style="border:0;" allowfullscreen=""
          loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div style="display:flex;gap:30px;margin-top:10px">
              <a href="" style="color: #0704aa;">Facebook</a>
              <a href=""style = "color: #a00707;">Youtube</a>
              <a href="" style="color:024da3">Zalo</a>
          </div>
     

    </div>
  </div>

  <div class="footer-bottom">
    © 2025 didongviet. All rights reserved.
  </div>
</footer>
</DIV>
<script>
  const openChat = document.getElementById("openChat");
  const chatBox = document.getElementById("chatBox");
  const chatMessages = document.getElementById("chatMessages");

  openChat.onclick = () => {
    chatBox.style.display = chatBox.style.display === "block" ? "none" : "block";
  };

  function sendMessage() {
    const input = document.getElementById("userInput");
    const text = input.value.trim();
    if (!text) return;
    const userMsg = document.createElement("div");
    userMsg.className = "msg user";
    userMsg.textContent = text;
    chatMessages.appendChild(userMsg);
    const botMsg = document.createElement("div");
    botMsg.className = "msg bot";
    botMsg.textContent = "Nhân viên sẽ liên hệ với bạn sau";
    chatMessages.appendChild(botMsg);

    input.value = "";
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
</script>
</body>
