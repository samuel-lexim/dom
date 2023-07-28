<?php
$postId = get_the_ID();

if (isset($args) && $args) {
  $class = '';
  $bg = getDefaultImg('bg.png');

  ?>

  <div class="menu_section" style="background-image: url(<?= $bg ?>)">
    <div class="menu_section_inner w1328">

      <div class="tabControl">
        <div class="foodTab _tab activated" data-id="FoodTab">
          <svg width="90" height="58" viewBox="0 0 90 58" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.7622 12.8H23.4399C22.5754 12.8 21.6525 12.7362 20.6789 12.6182L20.6277 12.612L20.5767 12.6041C20.4445 12.5834 20.3081 12.5614 20.1677 12.538L19.8591 14H24.5195C24.8663 13.7455 25.2268 13.5093 25.6014 13.2923C27.4747 12.18 29.5511 11.64 31.7592 11.64C34.128 11.64 36.3798 12.4134 37.9418 14.3659C38.5377 15.1107 38.9699 15.9506 39.2728 16.8508C40.3523 15.3874 41.6485 14.1793 43.1796 13.2922C45.0529 12.18 47.1293 11.64 49.3374 11.64C51.7061 11.64 53.958 12.4134 55.52 14.3659C56.2629 15.2947 56.7515 16.3713 57.0522 17.5282C57.2816 17.4309 57.5064 17.3277 57.7267 17.2186C58.7858 15.7334 60.0376 14.4892 61.5061 13.5564C63.2912 12.3954 65.2807 11.8 67.4083 11.8C67.8195 11.8 68.2446 11.8217 68.6726 11.8763L70.1141 5.10982L82.3503 3.45628L77.7963 24.84H84.55L83.1614 28.8268C82.2333 31.4911 80.93 33.7742 79.106 35.4201C77.2085 37.1575 74.8727 38 72.2883 38C70.6887 38 69.1136 37.5725 67.7988 36.516C67.6272 36.6389 67.4516 36.7563 67.2721 36.8679C65.805 37.7799 64.1755 38.24 62.4483 38.24C60.0378 38.24 57.8534 37.3824 56.2505 35.5124L56.237 35.4966L56.2236 35.4806C55.4342 34.5333 54.9026 33.4476 54.5725 32.2802C54.2638 32.7748 53.9284 33.2508 53.5655 33.7072C51.3116 36.5417 48.3396 38.16 44.7774 38.16C42.2038 38.16 39.7537 37.494 37.9224 35.7074C37.2052 35.0077 36.6624 34.2101 36.2662 33.3455C36.1751 33.4674 36.0822 33.5879 35.9874 33.7072C33.7334 36.5417 30.7614 38.16 27.1992 38.16C24.6257 38.16 22.1755 37.494 20.3443 35.7074C18.4874 33.8958 17.7992 31.4275 17.7992 28.84C17.7992 27.0043 18.089 25.116 18.6313 23.1878L18.6371 23.167L18.6433 23.1462C18.6618 23.084 18.6805 23.0219 18.6994 22.96H17.9424L14.7024 38H2.80424L6.21074 22.1977C4.84389 22.0311 3.47641 21.5839 2.37214 20.607L2.32636 20.5665L2.28227 20.5242C0.806566 19.1075 0.359863 17.185 0.359863 15.4C0.359863 11.3617 1.92648 7.95148 5.06349 5.48336C8.17287 3.03121 12.2791 2.00003 16.9999 2.00003C17.3422 2.00003 17.7174 2.01867 18.1099 2.04887M5.53796 9.15273C4.0859 10.8354 3.35986 12.9179 3.35986 15.4C3.35986 16.6004 3.63003 17.5198 4.17035 18.1582C4.20875 18.2036 4.24851 18.2475 4.28964 18.2901C4.31262 18.3138 4.33603 18.3372 4.35986 18.36C4.39683 18.3927 4.43494 18.4246 4.47419 18.4555C4.9539 18.834 5.60355 19.0821 6.42313 19.2C6.55957 19.2197 6.70072 19.2357 6.84658 19.2481C6.86045 19.2493 6.87436 19.2504 6.88832 19.2515C6.9023 19.2526 6.91632 19.2537 6.93039 19.2548C7.11939 19.2689 7.3161 19.2771 7.52053 19.2794C7.56002 19.2798 7.5998 19.28 7.63986 19.28C7.63986 19.2534 7.62653 19.2267 7.59986 19.2C7.59986 19.1467 7.5732 19.0667 7.51986 18.96C7.35986 18.6134 7.23986 18.2534 7.15986 17.88C7.15741 17.8629 7.15502 17.8456 7.15268 17.8281C7.10414 17.4661 7.07986 17.0434 7.07986 16.56C7.07986 16.4581 7.0804 16.3572 7.08148 16.2572C7.10653 13.94 7.42179 12.1451 8.02727 10.8727C8.1065 10.7062 8.19069 10.5486 8.27986 10.4C8.3758 10.2453 8.47856 10.099 8.58815 9.96114C8.58899 9.96008 8.58983 9.95902 8.59068 9.95796C8.69759 9.82372 8.81099 9.69749 8.93087 9.57929C9.74685 8.77471 10.8632 8.34163 12.2799 8.28003L6.51986 35H12.2799L15.5199 19.96H21.3599L21.9999 17H16.1599L17.8399 9.04003C19.1199 9.3067 20.1865 9.5067 21.0399 9.64003C21.9199 9.7467 22.7199 9.80003 23.4399 9.80003C24.0532 9.6667 24.5732 9.4667 24.9999 9.20003C25.3627 8.96526 25.6743 8.67923 25.9346 8.34196C25.9552 8.31528 25.9755 8.28828 25.9954 8.26096C26.0384 8.20214 26.0799 8.14183 26.1199 8.08003C26.4132 7.6267 26.6665 7.01336 26.8799 6.24003C27.0932 5.4667 27.2132 5.05336 27.2399 5.00003C26.7332 5.16003 26.1865 5.28003 25.5999 5.36003C25.1419 5.42249 24.6432 5.46056 24.1039 5.47426C24.1039 5.47426 24.104 5.47426 24.1039 5.47426C24.0623 5.47532 24.0204 5.47623 23.9782 5.477C23.8671 5.47902 23.7543 5.48003 23.6399 5.48003C23.1599 5.48003 22.6265 5.4667 22.0399 5.44003C21.4799 5.3867 20.6665 5.3067 19.5999 5.20003C18.7999 5.12003 18.2265 5.0667 17.8799 5.04003C17.5332 5.01336 17.2399 5.00003 16.9999 5.00003C15.8012 5.00003 14.6764 5.07292 13.6255 5.21869C13.1192 5.28892 12.6301 5.37607 12.1581 5.48013C10.0792 5.93852 8.33309 6.72516 6.91986 7.84003C6.51126 8.16141 6.13783 8.50215 5.79957 8.86225C5.78964 8.87283 5.77973 8.88342 5.76986 8.89403C5.6906 8.97919 5.61331 9.06542 5.53796 9.15273ZM22.2494 2.4464C22.7703 2.4692 23.233 2.48003 23.6399 2.48003C24.2521 2.48003 24.7672 2.44581 25.1945 2.38754C25.6312 2.328 26.0095 2.24252 26.3365 2.13928L33.0907 0.00634766L30.0251 6.13772C30.0207 6.15269 30.016 6.16892 30.0109 6.18646C29.9565 6.37369 29.8774 6.6551 29.7718 7.03782C29.5127 7.97727 29.1576 8.9077 28.6386 9.70979C28.115 10.5189 27.4387 11.1952 26.6296 11.7187L26.6098 11.7315L26.5899 11.744C25.808 12.2327 24.9478 12.5423 24.0772 12.7316L23.7622 12.8M22.2494 2.4464C21.6995 2.39381 20.9166 2.31674 19.8984 2.21492C19.0972 2.13481 18.494 2.07841 18.1099 2.04887M23.5592 19.44C23.3765 19.7255 23.2017 20.0196 23.0349 20.3222C22.5846 21.1391 22.1922 22.0184 21.8576 22.96C21.7373 23.2986 21.6245 23.6453 21.5192 24C21.0392 25.7067 20.7992 27.32 20.7992 28.84C20.7992 30.92 21.3459 32.4934 22.4392 33.56C23.5326 34.6267 25.1192 35.16 27.1992 35.16C29.7326 35.16 31.8792 34.0534 33.6392 31.84C34.3294 30.9721 34.9088 29.9976 35.3776 28.9164C35.3886 28.891 35.3995 28.8656 35.4104 28.84C36.0066 27.4431 36.4196 25.8697 36.6495 24.12C36.6833 23.8628 36.7131 23.6017 36.739 23.3368C36.7402 23.3248 36.7413 23.3129 36.7425 23.3009C36.7483 23.2408 36.7539 23.1805 36.7592 23.12C36.8531 23.1049 36.9464 23.0892 37.0392 23.0727C37.1331 23.0561 37.2264 23.0387 37.3192 23.0207C38.1392 22.8612 38.9171 22.6471 39.6529 22.3783C39.5294 22.6935 39.4128 23.0161 39.303 23.3461C39.2397 23.5364 39.1787 23.7291 39.12 23.9243C39.1124 23.9495 39.1049 23.9748 39.0974 24C38.9256 24.6109 38.7845 25.2098 38.6742 25.7968C38.4763 26.8497 38.3774 27.8641 38.3774 28.84C38.3774 29.0537 38.3831 29.262 38.3947 29.465C38.4954 31.2379 39.0363 32.6029 40.0174 33.56C41.1107 34.6267 42.6974 35.16 44.7774 35.16C47.3107 35.16 49.4574 34.0534 51.2174 31.84C52.8114 29.8354 53.8148 27.2621 54.2276 24.12C54.2706 23.7929 54.3072 23.4595 54.3374 23.12C54.4312 23.1049 54.5246 23.0892 54.6174 23.0727C54.7112 23.0561 54.8046 23.0387 54.8974 23.0207C54.9346 23.0134 54.9718 23.0061 55.0089 22.9986C56.2409 22.7504 57.3771 22.3776 58.4174 21.88C58.42 21.8788 58.4226 21.8776 58.4252 21.8764C58.4914 21.8453 58.5568 21.814 58.6215 21.7824C58.582 21.8756 58.5432 21.9693 58.5051 22.0636C58.5048 22.0643 58.5046 22.065 58.5043 22.0657C58.5036 22.0674 58.5029 22.0692 58.5021 22.0709C58.3044 22.5608 58.1252 23.0663 57.9645 23.5876C57.9103 23.7633 57.8583 23.9408 57.8083 24.12C57.6825 24.5716 57.5741 25.018 57.4832 25.4593C57.2466 26.6076 57.1283 27.7212 57.1283 28.8C57.1283 30.8534 57.595 32.44 58.5283 33.56C59.4883 34.68 60.795 35.24 62.4483 35.24C63.621 35.24 64.7005 34.9337 65.6867 34.321C65.6873 34.3207 65.6878 34.3204 65.6883 34.32C65.7931 34.2549 65.8968 34.1863 65.9994 34.1143C66.8166 33.5409 67.5671 32.7483 68.251 31.7367C68.2582 31.726 68.2655 31.7152 68.2727 31.7045C68.3047 31.6568 68.3366 31.6087 68.3683 31.56C68.3827 31.6584 68.3992 31.7549 68.4177 31.8494C68.4228 31.8754 68.428 31.9014 68.4334 31.9271C68.5082 32.2831 68.6128 32.6108 68.7472 32.9103C68.9597 33.3842 69.2467 33.7874 69.6083 34.12C69.7335 34.226 69.8652 34.3223 70.0034 34.4091C70.6308 34.8031 71.3924 35 72.2883 35C73.4174 35 74.4421 34.7867 75.3626 34.3599C75.3779 34.3528 75.3931 34.3457 75.4083 34.3385C76.0138 34.052 76.5738 33.6726 77.0883 33.2C77.6004 32.7391 78.0751 32.1917 78.5125 31.5578C78.6698 31.3297 78.8223 31.0905 78.9699 30.84C79.4092 30.095 79.8056 29.2509 80.1593 28.3077C80.2167 28.1544 80.2731 27.9985 80.3283 27.84H78.6483C78.3016 28.96 77.8483 29.8267 77.2883 30.44C76.7347 31.0463 76.116 31.3529 75.4322 31.3599C75.4242 31.36 75.4163 31.36 75.4083 31.36C75.405 31.36 75.4018 31.36 75.3985 31.36C75.1292 31.3595 74.8938 31.3363 74.6923 31.2905C74.4587 31.2374 74.2707 31.1539 74.1283 31.04C73.8883 30.8 73.7683 30.4134 73.7683 29.88C73.7683 29.6667 73.7816 29.4667 73.8083 29.28C73.835 29.0667 73.875 28.84 73.9283 28.6L78.5283 7.00003L72.6083 7.80003L70.6483 17V16.84C70.6483 16.8136 70.6478 16.7874 70.6469 16.7615C70.6445 16.6983 70.6394 16.6365 70.6314 16.5763C70.5631 16.0629 70.2888 15.6575 69.8083 15.36C69.4962 15.152 69.1095 15.0019 68.6483 14.9098C68.4594 14.872 68.2581 14.844 68.0442 14.8258C67.8433 14.8086 67.6313 14.8 67.4083 14.8C66.9362 14.8 66.4753 14.8398 66.0256 14.9193C65.0672 15.0887 64.1595 15.4387 63.3027 15.9691C63.2443 16.0053 63.1862 16.0422 63.1283 16.08C62.2541 16.6331 61.4515 17.3533 60.7205 18.2406C60.5811 18.4099 60.4443 18.5852 60.3101 18.7665C60.2453 18.854 60.1812 18.9429 60.1177 19.0333C60.0067 19.1911 59.8975 19.3533 59.7902 19.5198C59.7272 19.5553 59.664 19.5904 59.6005 19.625C59.5998 19.6254 59.5992 19.6257 59.5985 19.6261C59.2078 19.8392 58.8063 20.036 58.3939 20.2166C58.2171 20.2941 58.0382 20.3685 57.8574 20.44C57.8251 20.4528 57.793 20.4654 57.761 20.4778C57.757 20.4793 57.7529 20.4809 57.7489 20.4824C57.6487 20.5211 57.5497 20.5581 57.452 20.5933C56.8566 20.8076 56.3075 20.9565 55.8045 21.04C55.7611 21.0472 55.718 21.054 55.6753 21.0602C55.4019 21.1001 55.1426 21.12 54.8974 21.12H54.6174L54.4574 21.04C54.4574 20.6984 54.4464 20.3704 54.4245 20.0561C54.3611 19.1452 54.2058 18.3493 53.9585 17.6682C53.7584 17.1169 53.498 16.6408 53.1774 16.24C53.1519 16.2083 53.1261 16.1769 53.1 16.1461C53.0674 16.1078 53.0342 16.0701 53.0005 16.0332C52.2088 15.1677 51.0944 14.7054 49.6574 14.6465C49.5524 14.6422 49.4458 14.64 49.3374 14.64C48.4439 14.64 47.5943 14.7533 46.7886 14.9799C46.3622 15.0997 45.9482 15.2513 45.5464 15.4346C45.257 15.5666 44.974 15.7151 44.6974 15.88C43.9499 16.3112 43.2606 16.8548 42.6294 17.5107C42.4361 17.7115 42.2482 17.9229 42.0658 18.1449C41.7388 18.5427 41.4293 18.9744 41.1374 19.44C41.121 19.4656 41.1047 19.4913 41.0885 19.517C40.9768 19.6937 40.8682 19.8737 40.7626 20.0569C40.7166 20.1367 40.6712 20.2171 40.6264 20.2981C40.5115 20.3466 40.3958 20.394 40.2792 20.44C40.247 20.4528 40.2149 20.4654 40.1828 20.4778C40.1788 20.4793 40.1748 20.4809 40.1708 20.4824C40.0706 20.5211 39.9716 20.5581 39.8738 20.5933C39.2785 20.8076 38.7293 20.9565 38.2263 21.04C37.9051 21.0934 37.6028 21.12 37.3192 21.12H37.0392L36.8792 21.04C36.8792 20.6984 36.8683 20.3704 36.8464 20.0561C36.783 19.1452 36.6276 18.3493 36.3804 17.6682C36.1802 17.1169 35.9199 16.6408 35.5992 16.24C35.5738 16.2083 35.548 16.1769 35.5218 16.1461C35.4893 16.1078 35.4561 16.0701 35.4224 16.0332C34.6307 15.1677 33.5163 14.7054 32.0792 14.6465C31.9743 14.6422 31.8676 14.64 31.7592 14.64C30.8658 14.64 30.0162 14.7533 29.2104 14.9799C28.477 15.1861 27.78 15.4861 27.1192 15.88C26.3242 16.3387 25.5949 16.9245 24.9314 17.6373C24.4376 18.1678 23.9802 18.7687 23.5592 19.44ZM33.4973 18.5333C33.4614 18.3433 33.4178 18.1743 33.3664 18.0263C33.3076 17.8566 33.2385 17.7145 33.1592 17.6C33.0183 17.3711 32.8134 17.2177 32.5445 17.14C32.4063 17.1 32.2512 17.08 32.0792 17.08C31.9721 17.08 31.8654 17.0891 31.7592 17.1072C31.6701 17.1224 31.5814 17.144 31.4929 17.172C31.1625 17.2764 30.8368 17.4698 30.5156 17.7522C29.8007 18.3807 29.1086 19.45 28.4392 20.96C27.3192 23.5467 26.7592 26 26.7592 28.32C26.7592 29.5734 26.8926 30.4267 27.1592 30.88C27.4526 31.3334 27.9992 31.56 28.7992 31.56C29.7859 31.56 30.7192 30.76 31.5992 29.16C32.5059 27.56 33.1192 25.5867 33.4392 23.24C33.0659 23.16 32.7859 22.9867 32.5992 22.72C32.4392 22.4267 32.3592 22.04 32.3592 21.56C32.3592 21.0534 32.4659 20.6134 32.6792 20.24C32.8926 19.8667 33.1992 19.5867 33.5992 19.4C33.5789 19.0742 33.5449 18.7853 33.4973 18.5333ZM51.0754 18.5333C51.0396 18.3433 50.9959 18.1743 50.9446 18.0263C50.8857 17.8566 50.8166 17.7145 50.7374 17.6C50.5965 17.3711 50.3915 17.2177 50.1227 17.14C49.9845 17.1 49.8294 17.08 49.6574 17.08C49.5502 17.08 49.4436 17.0891 49.3374 17.1072C49.2483 17.1224 49.1595 17.144 49.0711 17.172C48.7407 17.2764 48.4149 17.4698 48.0937 17.7522C47.6699 18.1248 47.2542 18.6523 46.8464 19.3346C46.5663 19.8034 46.2899 20.3452 46.0174 20.96C45.9263 21.1703 45.8389 21.3798 45.7553 21.5883C45.641 21.8733 45.5336 22.1565 45.4331 22.4382C44.7026 24.4858 44.3374 26.4464 44.3374 28.32C44.3374 29.5734 44.4707 30.4267 44.7374 30.88C45.0307 31.3334 45.5774 31.56 46.3774 31.56C47.364 31.56 48.2974 30.76 49.1774 29.16C50.084 27.56 50.6974 25.5867 51.0174 23.24C50.644 23.16 50.364 22.9867 50.1774 22.72C50.0174 22.4267 49.9374 22.04 49.9374 21.56C49.9374 21.0534 50.044 20.6134 50.2574 20.24C50.4707 19.8667 50.7774 19.5867 51.1774 19.4C51.157 19.0742 51.123 18.7853 51.0754 18.5333ZM64.6791 31.337C64.7953 31.3524 64.9184 31.36 65.0483 31.36C65.6636 31.36 66.2675 31.0988 66.8601 30.5764C66.9096 30.5328 66.959 30.4873 67.0083 30.44C67.6483 29.8 68.0883 29 68.3283 28.04V27.84L70.2883 18.68C70.2083 18.2534 70.0216 17.92 69.7283 17.68C69.4616 17.4134 69.1016 17.28 68.6483 17.28C68.6387 17.28 68.6292 17.2801 68.6196 17.2802C68.5885 17.2805 68.5574 17.2814 68.5264 17.2829C68.2806 17.2944 68.0394 17.3407 67.8027 17.422C67.6698 17.4676 67.5383 17.5242 67.4083 17.5918C67.2855 17.6556 67.164 17.7292 67.0438 17.8127C66.2106 18.3909 65.4387 19.4401 64.7283 20.96C63.6083 23.4134 63.0483 25.84 63.0483 28.24C63.0483 29.28 63.195 30.0667 63.4883 30.6C63.7306 31.0185 64.1275 31.2642 64.6791 31.337Z" fill="#F7C360"/>
            <path class="_underline" d="M3 55.9999C19.1667 51.6666 59 44.2999 89 49.4999" stroke="#F7C360" stroke-width="3"/>
          </svg>
        </div>

        <div class="drinkTab _tab" data-id="DrinkTab">
          <svg width="104" height="57" viewBox="0 0 104 57" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7288 36H3.0509L6.42307 20.2302C4.97205 20.0933 3.51904 19.6525 2.33484 18.6437L2.3135 18.6256L2.29251 18.607C0.750073 17.2425 0.240234 15.354 0.240234 13.56C0.240234 11.416 0.93293 9.41528 2.15147 7.60487L2.15856 7.59434C3.38228 5.79275 5.00901 4.28967 6.96288 3.06062L6.98234 3.04838L7.00199 3.03643C8.61071 2.05858 10.3596 1.31274 12.2349 0.790127L12.2469 0.786764C14.1616 0.261769 16.1219 0 18.1202 0C22.1601 0 25.6813 1.23848 28.2207 4.06257C29.7593 5.7386 30.7574 7.74818 31.2991 10H41.6979L41.6921 10.0278C41.9006 10.0094 42.1112 10 42.3237 10C43.3101 10 44.2551 10.2279 45.0953 10.6938L45.2423 10H45.9121C45.6213 9.27676 45.4734 8.49635 45.4734 7.68C45.4734 6.02794 46.0792 4.52303 47.2495 3.34137C48.421 2.13054 49.9395 1.48 51.6334 1.48C53.3165 1.48 54.8265 2.12233 55.995 3.31844C57.1911 4.48688 57.8334 5.99686 57.8334 7.68C57.8334 8.50106 57.6805 9.2809 57.3851 10H66.3128C66.8729 9.89264 67.4448 9.84 68.0249 9.84C69.991 9.84 71.9391 10.3916 73.4262 11.8787C74.1139 12.5663 74.5985 13.3549 74.9221 14.1976L77.2865 3.10973L89.5227 1.45619L87.3638 11.5885L89.3807 10H103.953L93.0455 17.5811C93.0658 17.6028 93.0861 17.6247 93.1063 17.6468C94.4628 19.1039 95.0523 20.9276 95.0974 22.84H102.077L100.743 26.7979C99.8354 29.4919 98.6207 31.8059 96.9642 33.4984L96.953 33.5099L96.9416 33.5213C95.1937 35.2692 93.0193 36.24 90.5402 36.24C88.4676 36.24 86.408 35.7466 84.7999 34.3335L84.7636 34.3016L84.7284 34.2686C83.9592 33.5475 83.4155 32.7095 83.0577 31.8042L82.1744 36H71.8569C71.1809 36.1591 70.4756 36.24 69.7449 36.24C67.7138 36.24 65.7169 35.6844 64.1787 34.1958L64.161 34.1787L64.1436 34.1613C63.5593 33.5771 63.1078 32.9264 62.7747 32.2296L61.976 36H51.1839C50.4525 36.1593 49.6946 36.24 48.9134 36.24C46.9104 36.24 45.0043 35.5907 43.5625 34.0495L43.5285 34.0131L43.4956 33.9755C42.128 32.4125 41.6334 30.4365 41.6334 28.44C41.6334 27.947 41.6707 27.437 41.7352 26.9185C41.8004 26.3679 41.8957 25.8017 42.0177 25.222L42.7215 21.8999C42.5499 21.9133 42.3772 21.92 42.2037 21.92C41.3251 21.92 40.2772 21.718 39.3512 21.0215L36.1979 36H24.301L24.8798 33.27C24.6963 33.4514 24.5092 33.6274 24.3183 33.7978L24.3071 33.8078L24.2957 33.8177C22.403 35.4739 20.1948 36.52 17.7202 36.52C16.6941 36.52 15.6933 36.3354 14.7288 36ZM15.5576 33.11C16.289 33.3833 17.0099 33.52 17.7202 33.52C19.2936 33.52 20.8269 32.8667 22.3202 31.56C23.8136 30.2267 25.1069 28.3867 26.2002 26.04C26.3384 25.7502 26.4714 25.4567 26.5992 25.1595C27.2357 23.6788 27.7427 22.1056 28.1202 20.44C28.5531 18.5303 28.7793 16.6448 28.7989 14.7837C28.7998 14.6958 28.8002 14.6079 28.8002 14.52C28.8002 10.92 27.8669 8.10667 26.0002 6.08C25.2824 5.27898 24.4449 4.63421 23.4877 4.14567C22.986 3.88964 22.4515 3.67652 21.8841 3.50632C21.6532 3.43708 21.417 3.37493 21.1752 3.3199C20.2386 3.10663 19.2203 3 18.1202 3C17.8929 3 17.6662 3.0039 17.4402 3.0117C15.9434 3.06336 14.4767 3.28613 13.0402 3.68C11.9566 3.98201 10.9321 4.36686 9.96675 4.83456C9.87239 4.88027 9.7786 4.92678 9.68538 4.97407C9.3007 5.16924 8.92566 5.37788 8.56024 5.6C8.45833 5.6641 8.35774 5.72891 8.25847 5.79444C8.25806 5.79471 8.25765 5.79498 8.25724 5.79525C7.22325 6.47783 6.33216 7.23736 5.58399 8.07385C5.23903 8.45954 4.92444 8.86159 4.64023 9.28C3.7069 10.6667 3.24023 12.0933 3.24023 13.56C3.24023 14.6637 3.50909 15.5193 4.04679 16.1267C4.09554 16.1818 4.1465 16.2348 4.19967 16.2858C4.22598 16.311 4.25284 16.3358 4.28023 16.36C4.31559 16.3901 4.35182 16.4195 4.38891 16.4481C4.88443 16.8307 5.53488 17.0814 6.34025 17.2C6.47967 17.2205 6.62373 17.2371 6.77243 17.2498C6.78622 17.2509 6.80004 17.2521 6.81391 17.2532C6.8934 17.2595 6.9742 17.2647 7.05632 17.2688C7.16874 17.2744 7.28361 17.2779 7.40095 17.2793C7.44043 17.2798 7.48019 17.28 7.52024 17.28C7.52024 17.2533 7.5069 17.2267 7.48023 17.2C7.48023 17.1467 7.45357 17.0667 7.40023 16.96C7.33237 16.813 7.2717 16.6635 7.21822 16.5117C7.14563 16.3055 7.0863 16.095 7.04023 15.88C6.9869 15.5067 6.96023 15.0667 6.96023 14.56C6.96023 14.4577 6.9614 14.356 6.96374 14.2551C7.00231 12.5899 7.35906 11.1192 8.034 9.84288C8.28918 9.36036 8.58983 8.90563 8.93596 8.47869C9.189 8.16659 9.46634 7.86934 9.76798 7.58694C9.7768 7.57867 9.78565 7.57043 9.79452 7.56219C9.80969 7.54809 9.82493 7.53403 9.84023 7.52C9.98063 7.39114 10.1241 7.26693 10.2706 7.14737C10.8042 6.71186 11.3783 6.338 11.9929 6.02579C12.4748 5.781 12.9816 5.57411 13.5133 5.40512C13.5156 5.40436 13.518 5.40361 13.5204 5.40285C14.7038 5.02762 16.0104 4.84 17.4402 4.84C17.5835 4.84 17.7242 4.84356 17.8622 4.85069C17.9493 4.85518 18.0353 4.86109 18.1202 4.86841C19.4259 4.98097 20.4878 5.42787 21.3059 6.20914C21.4385 6.33572 21.5646 6.47107 21.6844 6.6152C21.7237 6.66252 21.7623 6.71079 21.8002 6.76C22.7869 8.01333 23.2802 9.89333 23.2802 12.4C23.2802 17.0133 22.5336 21.1067 21.0402 24.68C19.6617 28.0137 17.9768 29.7806 15.9857 29.9808C15.8584 29.9936 15.73 30 15.6002 30C15.2002 30 14.8136 29.9333 14.4402 29.8C14.3753 29.7768 14.3104 29.7516 14.2456 29.7244C13.9371 29.5951 13.6287 29.4203 13.3202 29.2L18.1202 6.76L12.2002 7.56L6.76023 33H12.5202L12.8402 31.4C13.1098 31.6261 13.378 31.8352 13.6448 32.0273C14.1896 32.4196 14.7285 32.7409 15.2616 32.9913C15.2678 32.9942 15.274 32.9971 15.2802 33C15.3729 33.0389 15.4653 33.0755 15.5576 33.11ZM20.2323 11.2285L17.1276 25.743C17.4713 25.237 17.8568 24.5277 18.2679 23.5336L18.2722 23.5232C19.5861 20.3793 20.2802 16.6907 20.2802 12.4C20.2802 11.9681 20.263 11.5789 20.2323 11.2285ZM28.0037 33H33.7637L36.9637 17.8C37.575 17.2357 38.0723 16.8476 38.4556 16.6358C38.507 16.6073 38.5564 16.5821 38.6037 16.56C39.0037 16.3733 39.4303 16.28 39.8837 16.28C40.0703 16.28 40.217 16.3467 40.3237 16.48C40.3936 16.5499 40.4578 16.6887 40.5163 16.8962C40.547 17.0052 40.5761 17.1331 40.6037 17.28C40.7103 17.9467 40.8837 18.3867 41.1237 18.6C41.3903 18.8133 41.7503 18.92 42.2037 18.92C42.6455 18.92 43.0444 18.8449 43.4004 18.6948C43.732 18.555 44.0265 18.3501 44.2837 18.08C44.817 17.52 45.0837 16.8267 45.0837 16C45.0837 15.1915 44.8563 14.5146 44.4014 13.9695C44.3762 13.9392 44.3503 13.9094 44.3237 13.88C43.817 13.2933 43.1503 13 42.3237 13C41.8913 13 41.4589 13.0674 41.0265 13.2022C40.8879 13.2455 40.7494 13.2956 40.6108 13.3526C40.5123 13.3932 40.4139 13.4372 40.3155 13.4847C40.2915 13.4963 40.2676 13.508 40.2437 13.52C40.1309 13.5741 40.0109 13.6378 39.8837 13.711C39.3735 14.0044 38.7468 14.4511 38.0037 15.0512C37.9786 15.0714 37.9534 15.0918 37.9281 15.1124C37.7842 15.2293 37.6361 15.3518 37.4837 15.48L38.0037 13H32.2437L28.0037 33ZM44.9534 25.84C44.8467 26.3467 44.7667 26.8267 44.7134 27.28C44.66 27.7067 44.6334 28.0933 44.6334 28.44C44.6334 29.96 45.0067 31.1467 45.7534 32C46.5267 32.8267 47.58 33.24 48.9134 33.24C49.5366 33.24 50.1361 33.1701 50.7118 33.0304C51.1347 32.9278 51.5449 32.7874 51.9421 32.6093C52.123 32.5282 52.3013 32.4393 52.4769 32.3426C52.9307 32.0926 53.3667 31.7904 53.7849 31.436C53.8145 31.4109 53.844 31.3856 53.8734 31.36C53.9823 31.2652 54.0895 31.1671 54.195 31.0656L53.7849 33H59.5449L62.2649 20.16C62.6116 19.0133 63.0516 18.12 63.5849 17.48C64.0214 16.9603 64.4823 16.6432 64.9674 16.5286C65.1046 16.4962 65.2438 16.48 65.3849 16.48C65.6361 16.48 65.8544 16.5275 66.0399 16.6224C66.2088 16.7089 66.3505 16.8348 66.4649 17C66.7049 17.3467 66.8249 17.8533 66.8249 18.52C66.8249 18.9733 66.7716 19.5333 66.6649 20.2C66.5583 20.8667 66.3183 21.96 65.9449 23.48C65.5716 25.0533 65.3183 26.2 65.1849 26.92C65.0783 27.64 65.0249 28.24 65.0249 28.72C65.0249 30.1067 65.4383 31.2133 66.2649 32.04C67.0916 32.84 68.2516 33.24 69.7449 33.24C70.1374 33.24 70.5168 33.2065 70.883 33.1396C71.4013 33.0449 71.8934 32.8831 72.3592 32.6543C72.5718 32.5499 72.7788 32.4316 72.9805 32.2993C73.3302 32.0699 73.6634 31.7985 73.9802 31.4852C74.0086 31.4571 74.0368 31.4287 74.0649 31.4C74.177 31.2879 74.2875 31.1706 74.3965 31.0481L73.9802 33H79.7402L81.8202 23.12C82.4602 22.5867 83.0069 22.2133 83.4602 22C83.7188 21.8707 83.9658 21.7762 84.2012 21.7166C84.4027 21.6655 84.5957 21.64 84.7802 21.64C85.2602 21.64 85.6202 21.8 85.8602 22.12C86.1002 22.44 86.2202 22.92 86.2202 23.56C86.2202 23.8267 86.2069 24.08 86.1802 24.32C86.1536 24.56 86.1136 24.8 86.0602 25.04L85.7402 26.6C85.6602 26.9733 85.5936 27.3333 85.5402 27.68C85.5136 28.0267 85.5002 28.36 85.5002 28.68C85.5002 30.1467 85.9269 31.28 86.7802 32.08C87.6602 32.8533 88.9136 33.24 90.5402 33.24C91.7066 33.24 92.7701 32.9247 93.7308 32.294C94.11 32.0451 94.4731 31.7471 94.8202 31.4C95.1976 31.0144 95.5561 30.572 95.8957 30.0728C96.153 29.6945 96.3994 29.2836 96.635 28.84C97.0116 28.1308 97.3605 27.3383 97.6815 26.4624C97.7559 26.2594 97.8288 26.0519 97.9002 25.84H96.2202C95.6069 27.28 95.0602 28.2267 94.5802 28.68C94.1002 29.1333 93.5269 29.36 92.8602 29.36C92.8329 29.36 92.8059 29.3597 92.7793 29.3591C92.7639 29.3587 92.7486 29.3582 92.7335 29.3576C92.6964 29.3562 92.6601 29.3542 92.6245 29.3515C92.2075 29.3204 91.886 29.2032 91.6602 29C91.4202 28.76 91.3002 28.3867 91.3002 27.88C91.3002 27.7733 91.3136 27.6133 91.3402 27.4C91.3936 27.1867 91.4469 26.92 91.5002 26.6L91.9402 24.6C91.9936 24.36 92.0336 24.12 92.0602 23.88C92.0869 23.6133 92.1002 23.3467 92.1002 23.08C92.1002 21.6667 91.7002 20.5333 90.9002 19.68C90.7848 19.5526 90.6628 19.4347 90.5343 19.3263C89.9476 18.8317 89.2248 18.5351 88.3658 18.4367C88.1524 18.4122 87.9305 18.4 87.7002 18.4C87.5402 18.4 87.3669 18.4133 87.1802 18.44C87.0202 18.4667 86.7536 18.5067 86.3802 18.56L94.3802 13H90.4202L82.7002 19.08L85.7002 5L79.7802 5.8L75.507 25.84H75.5049C74.8916 27.28 74.3449 28.2267 73.8649 28.68C73.3849 29.1333 72.8116 29.36 72.1449 29.36C72.1033 29.36 72.0625 29.3592 72.0225 29.3576C72.0064 29.3569 71.9905 29.3561 71.9747 29.3552C71.941 29.3533 71.9078 29.3507 71.8753 29.3476C71.8137 29.3416 71.7542 29.3335 71.6968 29.3233C71.3814 29.2669 71.1308 29.1459 70.9449 28.96C70.6783 28.6667 70.5449 28.24 70.5449 27.68C70.5449 27.3067 70.5983 26.84 70.7049 26.28C70.8116 25.72 71.0383 24.76 71.3849 23.4C71.8116 21.6667 72.0916 20.3867 72.2249 19.56C72.3849 18.7067 72.4649 17.9733 72.4649 17.36C72.4649 15.8933 72.0783 14.7733 71.3049 14C70.5316 13.2267 69.4383 12.84 68.0249 12.84C67.6243 12.84 67.2366 12.8765 66.862 12.9494C66.4081 13.0377 65.9732 13.1796 65.5575 13.375C65.5399 13.3832 65.5224 13.3916 65.5049 13.4C65.4514 13.4258 65.3982 13.4525 65.3452 13.4802C64.7979 13.7654 64.2778 14.1459 63.7849 14.6218C63.6358 14.7658 63.4891 14.9185 63.3449 15.08L63.7849 13H58.0249L54.9896 27.3177C54.7503 27.721 54.4716 28.0818 54.1534 28.4C53.5158 29.012 52.8417 29.3314 52.131 29.3582C52.0985 29.3594 52.066 29.36 52.0334 29.36C51.8805 29.36 51.7384 29.3528 51.6073 29.3383C51.5698 29.3341 51.5332 29.3294 51.4975 29.3241C51.1787 29.2765 50.9307 29.1819 50.7534 29.04C50.5134 28.8 50.3934 28.4133 50.3934 27.88C50.3934 27.6667 50.4067 27.4667 50.4334 27.28C50.46 27.0667 50.5 26.84 50.5534 26.6L53.4334 13H47.6734L44.9534 25.84ZM53.8734 9.92C54.5134 9.30667 54.8334 8.56 54.8334 7.68C54.8334 6.8 54.5134 6.05334 53.8734 5.44C53.26 4.8 52.5134 4.48 51.6334 4.48C50.7534 4.48 50.0067 4.8 49.3934 5.44C48.78 6.05334 48.4734 6.8 48.4734 7.68C48.4734 8.56 48.78 9.30667 49.3934 9.92C49.4206 9.94728 49.4482 9.97394 49.476 10C50.0734 10.56 50.7925 10.84 51.6334 10.84C52.3129 10.84 52.9129 10.6572 53.4334 10.2915C53.557 10.2046 53.6761 10.1075 53.7907 10C53.8186 9.97394 53.8461 9.94728 53.8734 9.92Z" fill="#F7C360"/>
            <path class="_underline" d="M2 55C20.6105 49.7719 66.4651 40.8841 101 47.1578" stroke="#F7C360" stroke-width="3"/>
          </svg>
        </div>
      </div>

      <div class="tabContent">
        <div class="_content activated" id="FoodTab">
          <?php
          if ($args['food_menu'] && $args['food_menu']['menu_slider']) { ?>
            <div class="defaultSlick topGreenArrow">
              <?php foreach ($args['food_menu']['menu_slider'] as $menu) { ?>
                <div class="menu_slider_item">
                  <?php if ($menu['mobile']) { ?>
                    <img class="_mobile" src="<?= $menu['mobile'] ?>" />
                  <?php } ?>
                  <?php if ($menu['ipad']) { ?>
                    <img class="_ipad" src="<?= $menu['ipad'] ?>" />
                  <?php } ?>
                  <?php if ($menu['desktop']) { ?>
                    <img class="_desktop" src="<?= $menu['desktop'] ?>" />
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

        </div>

        <div class="_content" id="DrinkTab">

          <?php
          if ($args['drink_menu'] && $args['drink_menu']['menu_slider']) { ?>
            <div class="defaultSlick topGreenArrow">
              <?php foreach ($args['drink_menu']['menu_slider'] as $menu) { ?>
                <div class="menu_slider_item">
                  <?php if ($menu['mobile']) { ?>
                    <img class="_mobile" src="<?= $menu['mobile'] ?>" />
                  <?php } ?>
                  <?php if ($menu['ipad']) { ?>
                    <img class="_ipad" src="<?= $menu['ipad'] ?>" />
                  <?php } ?>
                  <?php if ($menu['desktop']) { ?>
                    <img class="_desktop" src="<?= $menu['desktop'] ?>" />
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

        </div>

      </div>

    </div>
  </div>

<?php } ?>