<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>مثال سریع</title>
   <script src="https://developer.eitaa.com/eitaa-web-app.js"></script>
   <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
   <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">-->
   <!--<link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">-->
   <style>
      body {
         font-family: Vazir, Tahoma, sans-serif;
      }
      .feature-button {
         width: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 0.5rem;
         border: 1px solid #dee2e6;
      }
   </style>
</head>
<body>
<div class="container-fluid">
   <header class="header-section py-4">
      <div class="container text-center">
         <h1 class="h5 fw-semibold mb-3 text-dark">مثال سریع</h1>
         <hr class="text-warning"/>
         <div id="user-info" class="user-badge px-3 py-2 rounded-pill d-inline-flex align-items-center gap-2 border">
            <i class="bi bi-person text-warning"></i>
            <span class="text-muted small">کاربر مهمان</span>
         </div>
      </div>
   </header>

   <main class="container">
      <div class="card feature-card border-2 border-warning shadow-sm">
         <div class="card-header bg-transparent border-bottom py-3">
            <h6 class="mb-0 d-flex align-items-center gap-2 text-dark">
               <i class="bi bi-stars text-warning"></i>
               برخی از امکانات SDK
            </h6>
         </div>
         <div class="card-body p-4">
            <div class="row g-3">
               <div class="col-md-3">
                  <button id="main-button-toggle" class="btn btn-light feature-button">
                     <i class="bi bi-toggle-on text-warning"></i>
                     <span>دکمه اصلی</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="back-button-toggle" class="btn btn-light feature-button">
                     <i class="bi bi-arrow-left text-warning"></i>
                     <span>دکمه برگشت</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="alert-button" class="btn btn-light feature-button">
                     <i class="bi bi-bell text-warning"></i>
                     <span>هشدار</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="confirm-button" class="btn btn-light feature-button">
                     <i class="bi bi-question-circle text-warning"></i>
                     <span>تأیید</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="popup-button" class="btn btn-light feature-button">
                     <i class="bi bi-fullscreen text-warning"></i>
                     <span>پاپ‌آپ</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="header-color-button" class="btn btn-light feature-button">
                     <i class="bi bi-palette text-warning"></i>
                     <span>رنگ سربرگ</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="close-button" class="btn btn-light feature-button">
                     <i class="bi bi-x text-warning"></i>
                     <span>بستن</span>
                  </button>
               </div>
               <div class="col-md-3">
                  <button id="contact-button" class="btn btn-light feature-button">
                     <i class="bi bi-telephone text-warning"></i>
                     <span>شماره تماس</span>
                  </button>
               </div>
               <div>
                   <a href="https://famenu.ir">فامنو</a>
               </div>
            </div>
         </div>
      </div>
   </main>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->
<script>
    class QuickEitaaApp {
       constructor() {
          this.webApp = window.Eitaa.WebApp;
          this.init();
       }
    
       init() {
          if (this.webApp) {
             document.querySelector('.text-muted.small').textContent =
                     this.webApp.initDataUnsafe.user.first_name + this.webApp.initDataUnsafe.user.last_name;
             this.setupEventListeners();
          }
       }
    
       setupEventListeners() {
          document.getElementById('main-button-toggle')?.addEventListener('click', () => this.toggleMainButton());
          document.getElementById('back-button-toggle')?.addEventListener('click', () => this.toggleBackButton());
          document.getElementById('alert-button')?.addEventListener('click', () => this.showAlert('این یک هشدار است!'));
          document.getElementById('confirm-button')?.addEventListener('click', () => this.showConfirm());
          document.getElementById('popup-button')?.addEventListener('click', () => this.showPopup());
          document.getElementById('header-color-button')?.addEventListener('click', () => this.changeHeaderColor());
          document.getElementById('close-button')?.addEventListener('click', () => this.webApp.close());
          document.getElementById('contact-button')?.addEventListener('click', () => this.requestContact());
       }
    
       toggleMainButton() {
          if (this.webApp.MainButton.isVisible) {
             this.webApp.MainButton.hide();
          } else {
             this.webApp.MainButton.setText('دکمه اصلی');
             this.webApp.MainButton.show();
          }
       }
    
       toggleBackButton() {
          if (this.webApp.BackButton.isVisible) {
             this.webApp.BackButton.hide();
          } else {
             this.webApp.BackButton.show();
          }
       }
       
       changeHeaderColor() {
          const headerColors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7'];
          const randomColor = headerColors[Math.floor(Math.random() * headerColors.length)];
          this.webApp.setHeaderColor(randomColor);
       }
       
       showAlert(message) {
          this.webApp.showAlert(message);
       }
    
       showConfirm() {
          this.webApp.showConfirm('آیا مطمئن هستید؟', (confirmed) => {
             alert(confirmed ? 'تأیید شد' : 'لغو شد');
          });
       }
    
       showPopup() {
          this.webApp.showPopup({
             title: 'پاپ‌آپ',
             message: 'این یک پاپ‌آپ نمونه است',
             buttons: [
                {id: 'ok' , text: 'تأیید'},
                {id: 'cancel', text: 'لغو'}
             ]
          }, (buttonId) => {
             alert(`کلیک شد : ${buttonId}`);
          });
       }
    
       requestContact() {
          this.webApp.requestContact((success, contact) => {
              console.log(concat);
             alert(success ? 'شماره دریافت شد' : 'لغو شد');
          });
       }
    
    }
    
    document.addEventListener('DOMContentLoaded', () => {
       new QuickEitaaApp();
       console.log("abbas maleki")
    });
</script>
</body>
</html>
    