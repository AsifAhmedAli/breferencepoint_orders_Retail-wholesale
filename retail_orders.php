<?php
include("db.php");
$taba = "";
$taba = $_GET['tab'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Retail Orders</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <script src="./assets/js/jquery.min.js"></script>

    <script src="./assets/js/sweetalert2@11.js"></script>
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="responsive-nav">
          <a href="" class="logo">
            <img src="./assets/images/logo.svg" alt="" />
          </a>
          <button class="humburger" id="humburger">

          </button>
        </div>
        <nav class="three-items" id="nav">
          <div class="left">
            <a href="" class="logo">
              <img src="./assets/images/logo.svg" alt="" />
            </a>
          </div>
          <div class="middle">
            <a href="./wholesale_orders_calendar.php" class="header-tab">
              <svg
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M5 29C5.27614 29 5.5 28.7761 5.5 28.5C5.5 28.2239 5.27614 28 5 28C4.72386 28 4.5 28.2239 4.5 28.5C4.5 28.7761 4.72386 29 5 29Z"
                />
                <path d="M16 23H17V24H16V23Z" />
                <path d="M18 23H19V24H18V23Z" />
                <path
                  d="M15 19H13C12.8674 19 12.7402 19.0527 12.6465 19.1465C12.5527 19.2402 12.5 19.3674 12.5 19.5V21.5C12.5 21.6326 12.5527 21.7598 12.6465 21.8535C12.7402 21.9473 12.8674 22 13 22H15C15.1326 22 15.2598 21.9473 15.3535 21.8535C15.4473 21.7598 15.5 21.6326 15.5 21.5V19.5C15.5 19.3674 15.4473 19.2402 15.3535 19.1465C15.2598 19.0527 15.1326 19 15 19ZM14.5 21H13.5V20H14.5V21Z"
                />
                <path d="M25.5 23H26.5V24H25.5V23Z" />
                <path d="M27.5 23H28.5V24H27.5V23Z" />
                <path
                  d="M22.5 22H24.5C24.6326 22 24.7598 21.9473 24.8535 21.8535C24.9473 21.7598 25 21.6326 25 21.5V19.5C25 19.3674 24.9473 19.2402 24.8535 19.1465C24.7598 19.0527 24.6326 19 24.5 19H22.5C22.3674 19 22.2402 19.0527 22.1465 19.1465C22.0527 19.2402 22 19.3674 22 19.5V21.5C22 21.6326 22.0527 21.7598 22.1465 21.8535C22.2402 21.9473 22.3674 22 22.5 22ZM23 20H24V21H23V20Z"
                />
                <path d="M16 15H17V16H16V15Z" />
                <path d="M18 15H19V16H18V15Z" />
                <path
                  d="M13 14H15C15.1326 14 15.2598 13.9473 15.3535 13.8535C15.4473 13.7598 15.5 13.6326 15.5 13.5V11.5C15.5 11.3674 15.4473 11.2402 15.3535 11.1465C15.2598 11.0527 15.1326 11 15 11H13C12.8674 11 12.7402 11.0527 12.6465 11.1465C12.5527 11.2402 12.5 11.3674 12.5 11.5V13.5C12.5 13.6326 12.5527 13.7598 12.6465 13.8535C12.7402 13.9473 12.8674 14 13 14V14ZM13.5 12H14.5V13H13.5V12Z"
                />
                <path d="M25.5 15H26.5V16H25.5V15Z" />
                <path d="M27.5 15H28.5V16H27.5V15Z" />
                <path
                  d="M22.5 14H24.5C24.6326 14 24.7598 13.9473 24.8535 13.8535C24.9473 13.7598 25 13.6326 25 13.5V11.5C25 11.3674 24.9473 11.2402 24.8535 11.1465C24.7598 11.0527 24.6326 11 24.5 11H22.5C22.3674 11 22.2402 11.0527 22.1465 11.1465C22.0527 11.2402 22 11.3674 22 11.5V13.5C22 13.6326 22.0527 13.7598 22.1465 13.8535C22.2402 13.9473 22.3674 14 22.5 14V14ZM23 12H24V13H23V12Z"
                />
                <path
                  d="M30 1H11C10.8674 1.00001 10.7402 1.05269 10.6465 1.14645C10.5527 1.24022 10.5 1.36739 10.5 1.5V26H9.18098L6.32007 23.6159C6.23022 23.541 6.11696 23.5 6 23.5H5.5V15.0962L6.46423 12.6857C6.48786 12.6266 6.5 12.5636 6.5 12.5V10.5C6.49999 10.3674 6.44731 10.2402 6.35355 10.1465C6.25978 10.0527 6.13261 10 6 10H2C1.86739 10 1.74022 10.0527 1.64645 10.1465C1.55269 10.2402 1.50001 10.3674 1.5 10.5V12.5C1.5 12.5636 1.51214 12.6266 1.53577 12.6857L2.5 15.0962V23.5H2C1.86739 23.5 1.74022 23.5527 1.64645 23.6465C1.55269 23.7402 1.50001 23.8674 1.5 24V28C1.50001 28.1326 1.55269 28.2598 1.64645 28.3535C1.74022 28.4473 1.86739 28.5 2 28.5H2.5C2.5 29.163 2.76339 29.7989 3.23223 30.2678C3.70107 30.7366 4.33696 31 5 31C5.66304 31 6.29893 30.7366 6.76777 30.2678C7.23661 29.7989 7.5 29.163 7.5 28.5H10.5V30.5C10.5 30.6326 10.5527 30.7598 10.6465 30.8535C10.7402 30.9473 10.8674 31 11 31H14C14.1326 31 14.2598 30.9473 14.3535 30.8535C14.4473 30.7598 14.5 30.6326 14.5 30.5V28.5H18.5V30.5C18.5 30.6326 18.5527 30.7598 18.6465 30.8535C18.7402 30.9473 18.8674 31 19 31H22C22.1326 31 22.2598 30.9473 22.3535 30.8535C22.4473 30.7598 22.5 30.6326 22.5 30.5V28.5H26.5V30.5C26.5 30.6326 26.5527 30.7598 26.6465 30.8535C26.7402 30.9473 26.8674 31 27 31H30C30.1326 31 30.2598 30.9473 30.3535 30.8535C30.4473 30.7598 30.5 30.6326 30.5 30.5V1.5C30.5 1.36739 30.4473 1.24022 30.3535 1.14645C30.2598 1.05269 30.1326 1.00001 30 1V1ZM11.5 27.5V26H29.5V27.5H11.5ZM29.5 17H21V10H29.5V17ZM29.5 25H21V18H29.5V25ZM11.5 25V18H20V25H11.5ZM20 17H11.5V10H20V17ZM29.5 9H21V2H29.5V9ZM11.5 2H20V9H11.5V2ZM2.5 11H5.5V12.4037L4.6615 14.5H4.5V12H3.5V14.5H3.3385L2.5 12.4037V11ZM3.5 15.5H4.5V23.5H3.5V15.5ZM5 30C4.70333 30 4.41332 29.912 4.16664 29.7472C3.91997 29.5824 3.72771 29.3481 3.61418 29.074C3.50065 28.7999 3.47094 28.4983 3.52882 28.2074C3.5867 27.9164 3.72956 27.6491 3.93934 27.4393C4.14912 27.2296 4.41639 27.0867 4.70736 27.0288C4.99834 26.9709 5.29994 27.0007 5.57403 27.1142C5.84811 27.2277 6.08238 27.42 6.2472 27.6666C6.41203 27.9133 6.5 28.2033 6.5 28.5C6.49955 28.8977 6.34136 29.279 6.06016 29.5602C5.77895 29.8414 5.39769 29.9995 5 30V30ZM7.29062 27.5C7.0962 27.0542 6.77591 26.6748 6.36903 26.4084C5.96215 26.1419 5.48636 26 5 26C4.51364 26 4.03785 26.1419 3.63097 26.4084C3.22409 26.6748 2.90381 27.0542 2.70938 27.5H2.5V24.5H5.81897L8.5 26.7342V27.5H7.29062ZM9.5 27H10.5V27.5H9.5V27ZM13.5 30H11.5V28.5H13.5V30ZM21.5 30H19.5V28.5H21.5V30ZM29.5 30H27.5V28.5H29.5V30Z"
                />
                <path d="M16 7H17V8H16V7Z" />
                <path d="M18 7H19V8H18V7Z" />
                <path
                  d="M15 3H13C12.8674 3.00001 12.7402 3.05269 12.6465 3.14645C12.5527 3.24022 12.5 3.36739 12.5 3.5V5.5C12.5 5.63261 12.5527 5.75978 12.6465 5.85355C12.7402 5.94731 12.8674 5.99999 13 6H15C15.1326 5.99999 15.2598 5.94731 15.3535 5.85355C15.4473 5.75978 15.5 5.63261 15.5 5.5V3.5C15.5 3.36739 15.4473 3.24022 15.3535 3.14645C15.2598 3.05269 15.1326 3.00001 15 3V3ZM14.5 5H13.5V4H14.5V5Z"
                />
                <path d="M25.5 7H26.5V8H25.5V7Z" />
                <path d="M27.5 7H28.5V8H27.5V7Z" />
                <path
                  d="M22.5 6H24.5C24.6326 5.99999 24.7598 5.94731 24.8535 5.85355C24.9473 5.75978 25 5.63261 25 5.5V3.5C25 3.36739 24.9473 3.24022 24.8535 3.14645C24.7598 3.05269 24.6326 3.00001 24.5 3H22.5C22.3674 3.00001 22.2402 3.05269 22.1465 3.14645C22.0527 3.24022 22 3.36739 22 3.5V5.5C22 5.63261 22.0527 5.75978 22.1465 5.85355C22.2402 5.94731 22.3674 5.99999 22.5 6ZM23 4H24V5H23V4Z"
                />
              </svg>
              <span> Wholesale Orders </span>
            </a>
            <a href="#" class="header-tab active">
              <svg
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M32 12.8938V8.71669C32 7.90681 31.3411 7.24794 30.5312 7.24794H24.7521V1.46875C24.7521 0.658875 24.0932 0 23.2833 0H12.7774C12.5184 0 12.3086 0.209875 12.3086 0.46875C12.3086 0.727625 12.5184 0.9375 12.7774 0.9375H23.2834C23.5763 0.9375 23.8146 1.17581 23.8146 1.46875V7.24794H8.18544V1.46875C8.18544 1.17581 8.42381 0.9375 8.71669 0.9375H10.9024C11.1613 0.9375 11.3711 0.727625 11.3711 0.46875C11.3711 0.209875 11.1613 0 10.9024 0H8.71669C7.90681 0 7.24794 0.658875 7.24794 1.46875V7.24794H1.46875C0.658875 7.24794 0 7.90681 0 8.71669V12.8938C0 13.8049 0.401125 14.6236 1.03537 15.1842V28.9917H0.96875C0.434563 28.9917 0 29.4263 0 29.9604V31.0312C0 31.5654 0.434563 32 0.96875 32H4.61044C4.86937 32 5.07919 31.7901 5.07919 31.5312C5.07919 31.2724 4.86937 31.0625 4.61044 31.0625H0.96875C0.951563 31.0625 0.9375 31.0485 0.9375 31.0312V29.9604C0.9375 29.9432 0.951563 29.9292 0.96875 29.9292H31.0312C31.0484 29.9292 31.0625 29.9432 31.0625 29.9604V31.0312C31.0625 31.0485 31.0484 31.0625 31.0312 31.0625H6.4855C6.22656 31.0625 6.01675 31.2724 6.01675 31.5312C6.01675 31.7901 6.22656 32 6.4855 32H31.0312C31.5654 32 32 31.5654 32 31.0312V29.9604C32 29.4263 31.5654 28.9917 31.0312 28.9917H30.9646V15.1842C31.5989 14.6236 32 13.8048 32 12.8938ZM0.990375 13.3625H5.12419C4.91019 14.3064 4.06506 15.0136 3.05731 15.0136C2.04956 15.0136 1.20438 14.3064 0.990375 13.3625ZM28.9427 15.0136C27.9349 15.0136 27.0898 14.3064 26.8758 13.3625H31.0096C30.7956 14.3064 29.9504 15.0136 28.9427 15.0136ZM31.0625 8.71669V12.425H26.8229V8.18544H30.5312C30.8241 8.18544 31.0625 8.42375 31.0625 8.71669ZM25.8854 8.18544V12.425H21.6458V8.18544H25.8854ZM25.8326 13.3625C25.6186 14.3064 24.7734 15.0136 23.7656 15.0136C22.7579 15.0136 21.9127 14.3064 21.6987 13.3625H25.8326ZM20.7083 12.425H16.4688V8.18544H20.7083V12.425ZM20.6554 13.3625C20.4414 14.3064 19.5963 15.0136 18.5886 15.0136C17.5808 15.0136 16.7356 14.3064 16.5216 13.3625H20.6554ZM15.5312 12.425H11.2917V8.18544H15.5312V12.425ZM15.4784 13.3625C15.2644 14.3064 14.4192 15.0136 13.4114 15.0136C12.4037 15.0136 11.5586 14.3064 11.3446 13.3625H15.4784ZM10.3542 8.18544V12.425H6.11456V8.18544H10.3542ZM10.3013 13.3625C10.0873 14.3064 9.24212 15.0136 8.23438 15.0136C7.22662 15.0136 6.38144 14.3064 6.16744 13.3625H10.3013ZM0.9375 8.71669C0.9375 8.42375 1.17581 8.18544 1.46875 8.18544H5.17706V12.425H0.9375V8.71669ZM21.6458 28.9917V18.5708C21.6458 18.5536 21.6599 18.5396 21.6771 18.5396H27.925C27.9422 18.5396 27.9562 18.5536 27.9562 18.5708V28.9916H21.6458V28.9917ZM30.0271 28.9917H28.8937V18.5708C28.8937 18.0366 28.4592 17.6021 27.925 17.6021H21.6771C21.1429 17.6021 20.7083 18.0366 20.7083 18.5708V28.9916H1.97287V15.7516C2.31012 15.8801 2.6755 15.951 3.05731 15.951C4.14675 15.951 5.10425 15.3778 5.64581 14.5176C6.18744 15.3778 7.14494 15.951 8.23438 15.951C9.32381 15.951 10.2813 15.3778 10.8229 14.5176C11.3645 15.3778 12.322 15.951 13.4114 15.951C14.5009 15.951 15.4584 15.3778 16 14.5176C16.5416 15.3778 17.4991 15.951 18.5886 15.951C19.678 15.951 20.6355 15.3778 21.1771 14.5176C21.7187 15.3778 22.6762 15.951 23.7656 15.951C24.8551 15.951 25.8126 15.3778 26.3542 14.5176C26.8958 15.3778 27.8533 15.951 28.9427 15.951C29.3245 15.951 29.6898 15.8801 30.0271 15.7516V28.9917Z"
                  fill="#212121"
                />
                <path
                  d="M26.3542 23.1351C26.0953 23.1351 25.8855 23.345 25.8855 23.6039V24.1216C25.8855 24.3804 26.0953 24.5903 26.3542 24.5903C26.6132 24.5903 26.823 24.3804 26.823 24.1216V23.6039C26.823 23.345 26.6132 23.1351 26.3542 23.1351Z"
                  fill="#212121"
                />
                <path
                  d="M17.5708 17.6021H4.07495C3.54076 17.6021 3.1062 18.0366 3.1062 18.5708V26.8896C3.1062 27.4237 3.54076 27.8583 4.07495 27.8583H17.5708C18.105 27.8583 18.5396 27.4237 18.5396 26.8896V18.5708C18.5396 18.0366 18.105 17.6021 17.5708 17.6021ZM4.07495 18.5396H17.5708C17.588 18.5396 17.6021 18.5536 17.6021 18.5708V24.85H4.0437V18.5708C4.0437 18.5536 4.05776 18.5396 4.07495 18.5396ZM17.5708 26.9208H4.07495C4.05776 26.9208 4.0437 26.9068 4.0437 26.8896V25.7875H17.6021V26.8896C17.6021 26.9068 17.588 26.9208 17.5708 26.9208Z"
                  fill="#212121"
                />
                <path
                  d="M9.31885 3.03955V5.1458C9.31885 5.67999 9.75341 6.11455 10.2876 6.11455H21.7126C22.2468 6.11455 22.6813 5.67999 22.6813 5.1458V3.03955C22.6813 2.50536 22.2468 2.0708 21.7126 2.0708H10.2876C9.75341 2.0708 9.31885 2.50536 9.31885 3.03955ZM21.7438 3.03955V5.1458C21.7438 5.16305 21.7298 5.17705 21.7126 5.17705H10.2876C10.2704 5.17705 10.2563 5.16305 10.2563 5.1458V3.03955C10.2563 3.0223 10.2704 3.0083 10.2876 3.0083H21.7126C21.7298 3.0083 21.7438 3.0223 21.7438 3.03955Z"
                  fill="#212121"
                />
                <path
                  d="M8.52409 23.1495C8.5914 23.1832 8.66296 23.1991 8.7334 23.1991C8.90534 23.1991 9.0709 23.1041 9.15303 22.9399L10.1884 20.8691C10.3042 20.6375 10.2103 20.3559 9.97878 20.2402C9.74709 20.1243 9.46559 20.2183 9.34984 20.4498L8.31446 22.5206C8.19871 22.7522 8.29259 23.0337 8.52409 23.1495Z"
                  fill="#212121"
                />
                <path
                  d="M11.6303 23.1495C11.6976 23.1832 11.7692 23.1991 11.8396 23.1991C12.0115 23.1991 12.1771 23.1041 12.2592 22.9399L13.2946 20.8691C13.4104 20.6375 13.3165 20.3559 13.085 20.2402C12.8534 20.1243 12.5718 20.2183 12.456 20.4498L11.4207 22.5206C11.3049 22.7522 11.3988 23.0337 11.6303 23.1495Z"
                  fill="#212121"
                />
              </svg>

              <span>Retail Orders</span>
            </a>
          </div>
          <div class="right">
            <p class="company_name">Company Name,</p>
            <a href="" class="logout">Logout</a>
            <img src="./assets/images/company.png" class="profile-img" alt="" />
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="container-fluid h-100">
        <div class="tabs-overflow">
          <div class="top-items">
            <nav>
              <div class="nav nav-tabs flex-nowrap" id="nav-tab" role="tablist">
                <button
                  class="nav-link active"
                  id="nav-home-tab"
                  data-toggle="tab"
                  data-target="#nav-home"
                  type="button"
                  role="tab"
                  aria-controls="nav-home"
                  aria-selected="false"
                  onclick="getcurrentpending()"
                >


                  Active Orders
                </button>
                <button
                  class="nav-link"
                  id="nav-profile-tab"
                  data-toggle="tab"
                  data-target="#nav-profile"
                  type="button"
                  role="tab"
                  aria-controls="nav-profile"
                  aria-selected="false"
                  onclick="getcurrentcompleted()"
                >
                  Completed Orders
                </button>
                <button
                  class="nav-link"
                  id="nav-contact-tab"
                  data-toggle="tab"
                  data-target="#nav-contact"
                  type="button"
                  role="tab"
                  aria-controls="nav-contact"
                  aria-selected="false"
                  onclick="getcurrentcancelled()"
                >
                  Cancelled Orders
                </button>
              </div>
            </nav>
            <!-- <h5 class="date-on-orders">Sun - August 2022</h5> -->
            <div class="d-flex align-items-center mt-3 mb-md-0 mb-2">
                <div class="btns-container">
                  <button class="change-month previous-month active" onclick="previous_month()"></button>
                  <button class="change-month next-month active" onclick="getNextMonth()"></button>
                </div>
                <h5 class="mt-0 mb-0" id="current_month"></h5>
            </div>
            <hr class="mb-4" />
          </div>
          <div class="tab-content" id="nav-tabContent tabs-overflow">
            <div
              class="tab-pane fade show active"
              id="nav-home"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <div class="container-fluid">
              <div class="row orders" id="showhere">
              </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-profile"
              role="tabpanel"
              aria-labelledby="nav-profile-tab"
            >
            <div class="row orders" id="showhere1">
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-contact"
              role="tabpanel"
              aria-labelledby="nav-contact-tab"
            >
            <div class="row orders" id="showhere2">
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <!-- <script src="./assets/js/jquery.slim.min.js"></script> -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script>
          const d = new Date();
          const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ];
          let date = d.getDate();
          let month = d.getMonth();
          let year = d.getFullYear();
          var monthnumber = month + 1;
          // document.getElementById("currentMonth").innerHTML = monthNames[month];
          // document.getElementById("currentYear").innerHTML = year;
          document.getElementById("current_month").innerHTML = monthNames[month] + " " + year;
          cuurentmonth = monthNames[month];
          cuurentyear = year;
          tab = "";
          if(document.getElementById('nav-home-tab').ariaSelected == "true"){
                  tab = "pending";
                }
                if(document.getElementById('nav-profile-tab').ariaSelected == "true"){
                  tab = "completed";
                }
                if(document.getElementById('nav-contact-tab').ariaSelected == "true"){
                  tab = "cancelled";
                }
          getretailorders();
          function getcurrentpending() {
            cuurentmonth = monthNames[month];
            cuurentyear = year;
            tab = "pending";
            getretailorders();
          }          
          function getcurrentcompleted() {
            cuurentmonth = monthNames[month];
            cuurentyear = year;
            tab = "completed";
            getretailorders();
          }

          function getcurrentcancelled() {
            cuurentmonth = monthNames[month];
            cuurentyear = year;
            tab = "cancelled";      
            getretailorders();
          }




          function getNextMonth() {
            month++;
            nextmonth = month + 1;
            if (month > 11) {
              month = month % 12;
              year++;
            }
            document.getElementById("current_month").innerHTML = monthNames[month] + " " + year;
            cuurentmonth = monthNames[month];
          cuurentyear = year;
          
                if(document.getElementById('nav-home-tab').ariaSelected == "true"){
                  tab = "pending";
                }
                if(document.getElementById('nav-profile-tab').ariaSelected == "true"){
                  tab = "completed";
                }
                if(document.getElementById('nav-contact-tab').ariaSelected == "true"){
                  tab = "cancelled";
                }
            getretailorders();
          }

          function previous_month() {

            // console.log(month);
            month = month - 1;
            previousmonth = month + 1;
            if (month < 0) {
              month = month + 12;
              year--;
            }
            document.getElementById("current_month").innerHTML = monthNames[month] + " " + year;
            cuurentmonth = monthNames[month];
          cuurentyear = year;
          if(document.getElementById('nav-home-tab').ariaSelected == "true"){
                  tab = "pending";
                }
                if(document.getElementById('nav-profile-tab').ariaSelected == "true"){
                  tab = "completed";
                }
                if(document.getElementById('nav-contact-tab').ariaSelected == "true"){
                  tab = "cancelled";
                }
            getretailorders();
          }

          function getretailorders() {
            document.getElementById("loader1").style.visibility = "visible";
            $.ajax({
              type: "post",
              data: {
                cuurentmonth: cuurentmonth,
                cuurentyear: cuurentyear,
                tab : tab
              },
              url: "backend/getretailorders.php",
              success: function (result) {
                if(tab == "pending"){
                  $("#showhere").html(result);
                }
                if(tab == "completed"){
                  $("#showhere1").html(result);
                }
                if(tab == "cancelled"){
                  $("#showhere2").html(result);
                }
                document.getElementById("loader1").style.visibility = "hidden";
              }
            });
          }
    </script>
    <?php
              if($taba == "cancelled"){
                echo "<script>
                document.getElementById('nav-contact-tab').click();
                </script>";
                }
                else if($taba == "paid" || $taba == "active"){
                  echo "<script>  
                  document.getElementById('nav-home-tab').click();
                  </script>";
                }
                else if($taba == "completed" || $taba == "Completed"){ 
                  echo "<script>
                  document.getElementById('nav-profile-tab').click();                  
                  </script>";
                }
                else{
                  echo "<script>
                  document.getElementById('nav-home-tab').click();
                  </script>"; 
                }
          ?>
  </body>
</html>
