<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;


trait SvgTrait {

  public static function search_icon(){
    $search_icon = '<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 20L15.514 15.506L20 20ZM18 9.5C18 11.7543 17.1045 13.9163 15.5104 15.5104C13.9163 17.1045 11.7543 18 9.5 18C7.24566 18 5.08365 17.1045 3.48959 15.5104C1.89553 13.9163 1 11.7543 1 9.5C1 7.24566 1.89553 5.08365 3.48959 3.48959C5.08365 1.89553 7.24566 1 9.5 1C11.7543 1 13.9163 1.89553 15.5104 3.48959C17.1045 5.08365 18 7.24566 18 9.5V9.5Z" stroke-width="2" stroke-linecap="round" /></svg>';

    return $search_icon;
  }

  public static function mike_icon(){
      $mike_icon = '<svg class="wow fadeInDown animated" data-wow-delay="1.2s" data-wow-duration="0.5s" width="201" height="191" viewBox="0 0 201 191" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M152.65 60.0388C148.702 53.2008 140.282 50.5247 133.196 53.5571L113.382 19.2374C112.168 17.1361 109.778 16.1437 107.433 16.7683C105.089 17.3932 103.509 19.4425 103.502 21.8685C103.454 38.5268 96.9571 53.6446 84.1936 66.8024C74.542 76.7519 64.7388 81.7774 64.6436 81.8249C64.4992 81.8976 64.364 81.9845 64.2343 82.0779L39.8186 96.1743C27.5532 103.256 23.3357 118.996 30.4171 131.261C37.0871 142.814 51.4374 147.223 63.3317 141.779L88.1796 167.81C91.4696 171.257 96.6494 172 100.776 169.618L105.887 166.667C108.641 165.077 110.479 162.36 110.931 159.212C111.383 156.065 110.382 152.94 108.187 150.64L86.8812 128.32L89.915 126.569C90.0614 126.503 90.2048 126.429 90.341 126.34C90.4326 126.28 99.6858 120.302 113.128 116.919C130.905 112.444 147.245 114.377 161.696 122.664C163.377 123.628 165.35 123.603 166.949 122.68C167.354 122.446 167.733 122.156 168.079 121.81C169.792 120.091 170.128 117.525 168.915 115.424L149.1 81.1036C155.27 76.4834 157.162 67.8538 153.214 61.0159L152.65 60.0388ZM100.913 151.91L103.746 154.879C104.633 155.808 105.037 157.069 104.854 158.341C104.672 159.611 103.93 160.709 102.818 161.351L97.7067 164.301C96.0403 165.264 93.9488 164.963 92.6204 163.572L68.8876 138.709L81.41 131.479L87.7451 138.116L86.4745 138.85C85.0063 139.697 84.5034 141.574 85.351 143.043C86.1986 144.511 88.0757 145.014 89.5439 144.166L92.1071 142.686L96.5502 147.34L95.7171 147.821C94.249 148.669 93.746 150.546 94.5936 152.014C95.4413 153.482 97.3184 153.985 98.7865 153.138L100.913 151.91ZM77.9453 111.351L61.4257 120.888C59.9576 121.736 59.4546 123.613 60.3022 125.081C61.1499 126.549 63.027 127.052 64.4951 126.205L81.0147 116.667L84.4579 122.631L80.5746 124.873C80.5244 124.899 80.474 124.923 80.4246 124.952L62.4311 135.34C62.4058 135.355 62.383 135.373 62.358 135.388C53.0351 140.716 41.1079 137.5 35.7335 128.192C30.3445 118.858 33.5541 106.88 42.888 101.491L64.9113 88.7755L77.9453 111.351ZM129.357 59.1862L142.306 81.6143L162.099 115.897C146.98 108.107 129.527 106.414 111.421 111.019C101.396 113.568 93.6676 117.383 89.7678 119.551L84.7963 110.94L70.2341 85.7172C74.0617 83.4234 81.2297 78.6378 88.4495 71.231C101.49 57.8527 108.751 41.8918 109.564 24.9038L129.357 59.1862ZM147.897 64.0856C150.149 67.9862 149.25 72.8555 145.995 75.7272L136.3 58.9344C140.414 57.5515 145.081 59.2079 147.333 63.1085L147.897 64.0856Z" /><path d="M144.774 44.5595C145.412 44.1907 145.921 43.5918 146.163 42.8339L149.798 31.4248C150.313 29.8096 149.421 28.0832 147.806 27.5683C146.19 27.0538 144.464 27.9459 143.949 29.561L140.314 40.9696C139.799 42.5848 140.691 44.3113 142.306 44.8261C143.164 45.0992 144.052 44.9763 144.774 44.5595Z" /><path d="M164.871 75.237C163.214 74.8754 161.579 75.9244 161.217 77.5805C160.855 79.2366 161.904 80.8725 163.56 81.2344L175.258 83.7903C176.036 83.96 176.809 83.819 177.448 83.4502C178.17 83.0334 178.72 82.3256 178.912 81.4468C179.274 79.7907 178.225 78.1548 176.569 77.7928L164.871 75.237Z" /><path d="M162.323 51.5605L156.436 54.9594C154.968 55.8071 154.465 57.6842 155.313 59.1523C156.16 60.6204 158.037 61.1234 159.506 60.2758L165.393 56.8769C166.861 56.0293 167.364 54.1521 166.516 52.684C165.669 51.2159 163.791 50.7129 162.323 51.5605Z" /><path d="M53.8765 127.437C53.7164 127.313 53.545 127.206 53.3664 127.118C53.1837 127.029 52.9964 126.956 52.8035 126.904C52.608 126.854 52.408 126.821 52.2065 126.809C52.0077 126.797 51.806 126.803 51.6081 126.829C51.4076 126.856 51.211 126.902 51.0236 126.964C50.6408 127.093 50.2872 127.297 49.9842 127.564C49.834 127.697 49.6957 127.844 49.5746 128.003C49.4535 128.161 49.3442 128.334 49.2559 128.513C49.165 128.693 49.0939 128.883 49.0422 129.076C48.9905 129.269 48.9571 129.469 48.9459 129.67C48.933 129.869 48.9397 130.071 48.9668 130.271C48.9924 130.469 49.0386 130.666 49.1023 130.856C49.1659 131.046 49.2486 131.232 49.3484 131.405C49.4481 131.578 49.568 131.742 49.7024 131.895C49.8336 132.043 49.9808 132.181 50.1409 132.305C50.2994 132.426 50.4708 132.533 50.6494 132.621C50.8295 132.712 51.0194 132.783 51.2123 132.835C51.4051 132.886 51.6052 132.92 51.8081 132.934C52.0069 132.946 52.2113 132.938 52.4092 132.913C52.6071 132.887 52.8037 132.841 52.9938 132.777C53.1865 132.712 53.3685 132.628 53.5413 132.528C53.7167 132.427 53.8803 132.311 54.0331 132.177C54.1833 132.044 54.3189 131.899 54.4427 131.739C54.5638 131.58 54.6704 131.409 54.7587 131.23C54.8481 131.047 54.9193 130.857 54.9736 130.663C55.0253 130.47 55.056 130.272 55.0699 130.069C55.0828 129.87 55.0761 129.668 55.0505 129.47C55.0234 129.27 54.9772 129.073 54.915 128.886C54.8498 128.693 54.7645 128.508 54.6648 128.335C54.565 128.163 54.4478 127.996 54.315 127.846C54.1822 127.696 54.035 127.558 53.8765 127.437Z" /></svg>';

      return $mike_icon;
  }

  public static function phone_icon(){
    $phone_icon = '<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4988 19.2499C14.7312 19.2512 14.9615 19.2063 15.1763 19.1176C15.3912 19.029 15.5862 18.8985 15.75 18.7336L18.1213 16.3624C18.2843 16.1984 18.3757 15.9767 18.3757 15.7455C18.3757 15.5143 18.2843 15.2926 18.1213 15.1286L14.6213 11.6286C14.4573 11.4657 14.2356 11.3742 14.0044 11.3742C13.7732 11.3742 13.5515 11.4657 13.3875 11.6286L11.9875 13.0199C11.0183 12.7614 10.1206 12.2857 9.36253 11.6286C8.70726 10.8694 8.23171 9.97213 7.97128 9.00363L9.36253 7.60363C9.5255 7.43969 9.61697 7.21792 9.61697 6.98675C9.61697 6.75559 9.5255 6.53382 9.36253 6.36988L5.86253 2.86988C5.69859 2.70691 5.47682 2.61544 5.24565 2.61544C5.01449 2.61544 4.79272 2.70691 4.62878 2.86988L2.26628 5.24988C2.10146 5.41372 1.97092 5.60874 1.88228 5.82357C1.79365 6.0384 1.74869 6.26874 1.75003 6.50113C1.82941 9.86314 3.17284 13.0718 5.51253 15.4874C7.92816 17.8271 11.1368 19.1705 14.4988 19.2499ZM5.25003 4.73363L7.51628 6.99988L6.38753 8.12863C6.28062 8.22877 6.20057 8.35415 6.1547 8.49327C6.10884 8.63239 6.09864 8.78079 6.12503 8.92488C6.45208 10.3865 7.1445 11.7412 8.13753 12.8624C9.25784 13.8567 10.6129 14.5493 12.075 14.8749C12.2169 14.9045 12.364 14.8985 12.503 14.8572C12.642 14.816 12.7685 14.7409 12.8713 14.6386L14 13.4836L16.2663 15.7499L14.5163 17.4999C11.6145 17.4252 8.84585 16.2671 6.75503 14.2536C4.73633 12.162 3.57494 9.3896 3.50003 6.48363L5.25003 4.73363ZM17.5 9.62488H19.25C19.2727 8.5845 19.0845 7.5503 18.6968 6.58461C18.3091 5.61892 17.7299 4.74172 16.994 4.00589C16.2582 3.27006 15.381 2.69082 14.4153 2.3031C13.4496 1.91538 12.4154 1.72719 11.375 1.74988V3.49988C12.1869 3.47179 12.996 3.61101 13.7518 3.90888C14.5076 4.20675 15.1941 4.65691 15.7685 5.23136C16.343 5.80582 16.7932 6.4923 17.091 7.24812C17.3889 8.00395 17.5281 8.81296 17.5 9.62488Z" /><path d="M11.375 7C13.2125 7 14 7.7875 14 9.625H15.75C15.75 6.8075 14.1925 5.25 11.375 5.25V7Z" /></svg>';

    return $phone_icon;
  }

  public static function mail_icon(){
    $mail_icon = '<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_424:102)"><path d="M14.4235 10.479L19.8056 5.803V15.1016L14.4235 10.479ZM7.48825 11.2709L9.37825 12.9115C9.67487 13.1635 10.0616 13.3158 10.4843 13.3158H10.4991H10.4982H10.5105C10.934 13.3158 11.3207 13.1626 11.6209 12.9089L11.6182 12.9106L13.5082 11.27L19.2535 16.2041H1.74562L7.48825 11.2709ZM1.73775 4.69437H19.264L10.8456 12.0059C10.751 12.0807 10.6338 12.1214 10.5131 12.1214H10.5009H10.5017H10.4895C10.3684 12.1215 10.2508 12.0805 10.1561 12.005L10.157 12.0059L1.73775 4.69437ZM1.19437 5.80213L6.57562 10.4781L1.19437 15.0981V5.80213ZM20.0944 3.66625C19.8844 3.56125 19.6376 3.5 19.376 3.5H1.62662C1.37302 3.50006 1.12289 3.55907 0.896 3.67238L0.905625 3.668C0.634002 3.80197 0.405254 4.00923 0.245222 4.26636C0.0851906 4.5235 0.00025143 4.82026 0 5.12313L0 15.7736C0.000463228 16.2047 0.171896 16.6179 0.476683 16.9227C0.78147 17.2275 1.19472 17.3989 1.62575 17.3994H19.3734C19.8044 17.3989 20.2177 17.2275 20.5224 16.9227C20.8272 16.6179 20.9987 16.2047 20.9991 15.7736V5.12663V5.12313C20.9991 4.487 20.6325 3.93575 20.0987 3.67063L20.0891 3.66625H20.0944Z" /></g><defs><clipPath id="clip0_424:102"><rect width="21" height="21" fill="white" /></clipPath></defs></svg>';
    
    return $mail_icon;
  }

  public static function marker_icon(){
    $marker_icon = '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.32987 4.94839C8.09889 3.17937 10.4982 2.18555 13 2.18555C15.5017 2.18555 17.901 3.17937 19.67 4.94839C21.4391 6.7174 22.4329 9.1167 22.4329 11.6185C22.4329 14.1202 21.4391 16.5195 19.67 18.2886L18.3841 19.5604C17.4362 20.4899 16.2066 21.6859 14.6943 23.1484C14.2398 23.5879 13.6322 23.8336 13 23.8336C12.3677 23.8336 11.7602 23.5879 11.3056 23.1484L7.52371 19.4694C7.04812 19.0025 6.65054 18.6092 6.32987 18.2886C5.45391 17.4126 4.75905 16.3728 4.28497 15.2283C3.8109 14.0839 3.56689 12.8572 3.56689 11.6185C3.56689 10.3797 3.8109 9.15308 4.28497 8.00862C4.75905 6.86416 5.45391 5.82429 6.32987 4.94839ZM18.5206 6.09672C17.0562 4.63255 15.07 3.8101 12.9992 3.8103C10.9283 3.8105 8.94238 4.63334 7.47821 6.0978C6.01404 7.56226 5.19159 9.54838 5.19179 11.6192C5.19199 13.6901 6.01483 15.676 7.47929 17.1402L9.08912 18.7306C10.2011 19.8171 11.3163 20.9004 12.4345 21.9806C12.586 22.1272 12.7886 22.2091 12.9994 22.2091C13.2103 22.2091 13.4128 22.1272 13.5644 21.9806L17.2412 18.4056C17.7504 17.9061 18.1761 17.4847 18.5195 17.1402C19.9837 15.676 20.8062 13.6902 20.8062 11.6196C20.8062 9.54892 19.9837 7.56308 18.5195 6.09889L18.5206 6.09672ZM13 8.6653C13.427 8.6653 13.8499 8.74942 14.2445 8.91286C14.6391 9.0763 14.9976 9.31585 15.2996 9.61784C15.6016 9.91983 15.8411 10.2783 16.0046 10.6729C16.168 11.0675 16.2521 11.4904 16.2521 11.9175C16.2521 12.3446 16.168 12.7674 16.0046 13.162C15.8411 13.5566 15.6016 13.9151 15.2996 14.2171C14.9976 14.5191 14.6391 14.7586 14.2445 14.9221C13.8499 15.0855 13.427 15.1696 13 15.1696C12.1479 15.1541 11.3359 14.8047 10.7388 14.1966C10.1417 13.5885 9.80714 12.7703 9.80714 11.918C9.80714 11.0658 10.1417 10.2476 10.7388 9.63946C11.3359 9.03136 12.1479 8.68194 13 8.66639V8.6653ZM13 10.2903C12.7863 10.2903 12.5747 10.3324 12.3773 10.4142C12.1798 10.4959 12.0005 10.6158 11.8494 10.7669C11.6983 10.918 11.5784 11.0974 11.4967 11.2948C11.4149 11.4922 11.3728 11.7038 11.3728 11.9175C11.3728 12.1312 11.4149 12.3427 11.4967 12.5402C11.5784 12.7376 11.6983 12.917 11.8494 13.0681C12.0005 13.2191 12.1798 13.339 12.3773 13.4208C12.5747 13.5025 12.7863 13.5446 13 13.5446C13.4314 13.5446 13.8451 13.3733 14.1502 13.0682C14.4552 12.7632 14.6266 12.3494 14.6266 11.918C14.6266 11.4866 14.4552 11.0729 14.1502 10.7678C13.8451 10.4628 13.4314 10.2914 13 10.2914V10.2903Z" />
    </svg>';
    
    return $marker_icon;
  }

  public static function date_shape_icon(){
    $date_shape_icon = '<svg width="90" height="68" viewBox="0 0 90 68" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M90 68C90 67.888 90 67.7573 90 67.6266C90 67.4959 90 67.3839 90 67.2718L90 34.5228L90 33.4585L90 0.728172C90 0.616145 90 0.485448 90 0.373421C90 0.242724 90 0.112026 90 0C89.0048 0.504119 88.1786 0.858868 87.6153 1.08292C83.5781 2.68863 80.1231 3.04338 78.4707 3.02471C77.7571 3.02471 77.0624 3.02471 76.3488 3.02471L0.131431 3.02471C3.66158 6.53487 5.91487 10.0264 9.42625 13.5365L-1.0569e-06 24.179L8.61881 34L-1.91548e-06 43.821L9.42624 54.4635C5.89609 57.9736 3.6428 61.4651 0.131429 64.9753L76.3676 64.9753C77.0812 64.9753 77.7759 64.9753 78.4895 64.9753C80.1419 64.9753 83.5969 65.3114 87.634 66.9171C88.1974 67.1411 89.0236 67.4959 90 68Z" fill="#EE0034" />
        </svg>';
    
    return $date_shape_icon;
  }

  public static function clock_icon(){
    $clock_icon = '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 0.96875C3.75391 0.96875 0.71875 4.00391 0.71875 7.75C0.71875 11.4961 3.75391 14.5312 7.5 14.5312C11.2461 14.5312 14.2812 11.4961 14.2812 7.75C14.2812 4.00391 11.2461 0.96875 7.5 0.96875ZM7.5 13.2188C4.46484 13.2188 2.03125 10.7852 2.03125 7.75C2.03125 4.74219 4.46484 2.28125 7.5 2.28125C10.5078 2.28125 12.9688 4.74219 12.9688 7.75C12.9688 10.7852 10.5078 13.2188 7.5 13.2188ZM9.16797 10.375C9.33203 10.4844 9.52344 10.457 9.63281 10.293L10.1523 9.60938C10.2617 9.44531 10.2344 9.25391 10.0703 9.14453L8.26562 7.80469V3.92188C8.26562 3.75781 8.10156 3.59375 7.9375 3.59375H7.0625C6.87109 3.59375 6.73438 3.75781 6.73438 3.92188V8.43359C6.73438 8.51562 6.76172 8.625 6.84375 8.67969L9.16797 10.375Z" />
      </svg>';
    
    return $clock_icon;
  }

  public static function door_icon(){
    $door_icon = '<svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.40866 0.0180514L18.1604 2.03336C18.5504 2.11397 18.8309 2.45792 18.8309 2.85561V18.9781C18.8309 19.1713 18.7641 19.3585 18.642 19.5083C18.5199 19.6581 18.3498 19.7612 18.1604 19.8003L8.40866 21.8156C8.28653 21.8408 8.16031 21.8386 8.03915 21.8091C7.918 21.7795 7.80494 21.7234 7.70818 21.6448C7.61141 21.5662 7.53336 21.4671 7.47969 21.3547C7.42601 21.2423 7.39805 21.1193 7.39784 20.9947V0.840297C7.39776 0.715556 7.42549 0.592363 7.47904 0.479671C7.53258 0.366978 7.61059 0.267617 7.70739 0.188809C7.8042 0.11 7.91736 0.0537245 8.03866 0.0240712C8.15997 -0.00558207 8.28636 -0.00786792 8.40866 0.0173796V0.0180514ZM5.38025 1.51207V3.19149H1.68133V18.6422H5.38025V20.3216H0.840664C0.63266 20.3215 0.432067 20.2444 0.277663 20.1052C0.123259 19.966 0.0260073 19.7746 0.0047077 19.5679L0 19.4826V2.35245C0 1.91714 0.330885 1.55976 0.75458 1.51677L0.840664 1.51207H5.38025ZM9.07917 1.87214V19.9629L17.1495 18.2949V3.53947L9.07917 1.87214ZM11.0968 9.90919C11.3643 9.90919 11.6209 10.0153 11.8101 10.2043C11.9993 10.3933 12.1056 10.6496 12.1056 10.9168C12.1056 11.1841 11.9993 11.4404 11.8101 11.6294C11.6209 11.8183 11.3643 11.9245 11.0968 11.9245C10.8292 11.9245 10.5726 11.8183 10.3834 11.6294C10.1943 11.4404 10.088 11.1841 10.088 10.9168C10.088 10.6496 10.1943 10.3933 10.3834 10.2043C10.5726 10.0153 10.8292 9.90919 11.0968 9.90919Z" />
      </svg>';
    
    return $door_icon;
  }

  public static function banner1_icon(){
    $banner1_icon = '<svg width="151" height="23" viewBox="0 0 151 23" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M119.439 6.03224L119.411 6.00196L119.382 5.97286C117.743 4.33397 115.036 4.22956 113.387 6.03117L100.004 20.3934C99.9313 20.4599 99.8719 20.4681 99.8482 20.4681C99.8338 20.4681 99.8264 20.4654 99.8239 20.4643C99.823 20.4639 99.8162 20.4614 99.8036 20.4475L99.7953 20.4384L99.7869 20.4294L86.3634 6.02362L86.3393 5.9978L86.3144 5.97286C84.6747 4.33323 81.9658 4.22947 80.3173 6.03361C80.3148 6.03631 80.3124 6.03901 80.3099 6.04172L66.8991 20.5154L66.8927 20.5224L66.8863 20.5294C66.8846 20.5313 66.8813 20.5348 66.8707 20.5392C66.8581 20.5446 66.8372 20.55 66.811 20.55C66.7848 20.55 66.764 20.5446 66.7513 20.5392C66.7407 20.5348 66.7374 20.5313 66.7357 20.5294L66.7294 20.5224L66.7229 20.5154L53.3121 6.04172C53.3097 6.03898 53.3072 6.03625 53.3047 6.03352C51.6938 4.27122 48.8604 4.27122 47.2495 6.03351L33.8313 20.5154L33.8248 20.5224L33.8184 20.5294C33.8167 20.5313 33.8134 20.5348 33.8028 20.5392C33.7902 20.5446 33.7694 20.55 33.7432 20.55C33.7169 20.55 33.6961 20.5446 33.6835 20.5392C33.6729 20.5348 33.6696 20.5313 33.6679 20.5294L33.6615 20.5224L33.655 20.5154L20.2368 6.03352C18.6263 4.27166 15.7939 4.27122 14.1829 6.03219L2.35542 18.7569C2.28258 18.8229 2.22335 18.8311 2.19975 18.8311C2.18538 18.8311 2.17794 18.8284 2.17543 18.8273L2.1753 18.8273C2.174 18.8267 2.16733 18.8239 2.15515 18.8105L2.12314 18.7753L2.08949 18.7416C2.05103 18.7032 2 18.6155 2 18.4779C2 18.3403 2.05103 18.2526 2.08949 18.2142L2.11553 18.1881L2.14059 18.1611L17.0844 2.07412C17.1571 2.00817 17.2163 2 17.2399 2C17.2543 2 17.2617 2.00273 17.2642 2.00382L17.2644 2.00387C17.2657 2.00442 17.2723 2.00722 17.2845 2.02062L17.2928 2.02972L17.3012 2.03872L30.7248 16.4445L30.7488 16.4703L30.7738 16.4953C32.4126 18.1342 35.1198 18.2386 36.7685 16.4371L50.1516 2.07474C50.2247 2.00822 50.2841 2 50.3078 2C50.3222 2 50.3296 2.00273 50.3321 2.00382C50.333 2.00422 50.3397 2.00672 50.3524 2.02062L50.3607 2.02972L50.369 2.03872L63.7926 16.4445L63.8167 16.4703L63.8416 16.4953C65.4805 18.1342 68.1877 18.2386 69.8364 16.4371L83.2194 2.07475C83.2925 2.00822 83.352 2 83.3757 2C83.39 2 83.3975 2.00273 83.4 2.00382L83.4001 2.00387C83.4014 2.00442 83.4081 2.00723 83.4203 2.02062L83.4285 2.02972L83.4369 2.03872L96.8605 16.4445L96.8846 16.4703L96.9095 16.4953C98.5484 18.1342 101.256 18.2386 102.904 16.4371L116.321 2.03872L116.329 2.02972L116.338 2.02062C116.339 2.01875 116.343 2.01524 116.353 2.01075C116.366 2.00539 116.387 2 116.413 2C116.439 2 116.46 2.00539 116.473 2.01075C116.483 2.01524 116.486 2.01875 116.488 2.02062L116.496 2.02972L116.505 2.03872L129.928 16.4445L129.952 16.4703L129.977 16.4953C131.617 18.1346 134.325 18.2386 135.974 16.4354C135.976 16.4324 135.979 16.4294 135.982 16.4264L147.801 3.71127C147.873 3.64521 147.933 3.63702 147.956 3.63702C147.971 3.63702 147.978 3.63976 147.981 3.64084L147.981 3.6409C147.982 3.64145 147.989 3.64426 148.001 3.65764L148.033 3.69286L148.067 3.72651C148.105 3.76497 148.156 3.85261 148.156 3.99025C148.156 4.12788 148.105 4.21552 148.067 4.25398L148.04 4.28002L148.015 4.30701L133.037 20.4317L133.028 20.4414C132.978 20.496 132.938 20.5186 132.918 20.528C132.897 20.5377 132.881 20.5399 132.87 20.5401C132.857 20.5403 132.81 20.5388 132.742 20.4776L119.439 6.03224Z" />
    </svg>';
    return $banner1_icon;
  }

  public static function quote_icon(){
    $quote_icon = '<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M20.4844 10.6914C20.9806 10.6914 21.3828 10.2891 21.3828 9.79297V6.91797C21.3828 4.44098 19.3676 2.42578 16.8906 2.42578H4.49219C2.0152 2.42578 0 4.44098 0 6.91797V17.6981C0 20.1751 2.0152 22.1903 4.49219 22.1903H10.3044C10.0999 28.9022 7.55325 32.3914 2.53656 32.8478C2.07377 32.8899 1.71952 33.2779 1.71952 33.7425V42.6758C1.71952 42.9229 1.82122 43.159 2.00073 43.3287C2.16802 43.4867 2.38895 43.5742 2.61787 43.5742C2.63467 43.5742 2.65156 43.5738 2.66836 43.5728C8.85931 43.2245 13.5854 41.0939 16.7153 37.24C19.8124 33.4265 21.3828 27.8542 21.3828 20.6777V17.4596C21.3828 16.9635 20.9806 16.5612 20.4844 16.5612C19.9882 16.5612 19.5859 16.9635 19.5859 17.4596V20.6777C19.5859 33.8528 14.3269 40.7426 3.51648 41.7099V34.5371C6.24872 34.1121 8.36212 32.8403 9.80618 30.7492C11.3379 28.5309 12.1146 25.3491 12.1146 21.2919C12.1146 20.7958 11.7124 20.3935 11.2162 20.3935H4.49219C3.00599 20.3935 1.79688 19.1843 1.79688 17.6981V6.91797C1.79688 5.43177 3.00599 4.22266 4.49219 4.22266H16.8906C18.3768 4.22266 19.5859 5.43177 19.5859 6.91797V9.79297C19.5859 10.2891 19.9882 10.6914 20.4844 10.6914Z" />
    <path d="M41.5078 2.42578H29.1094C26.6324 2.42578 24.6172 4.44098 24.6172 6.91797V17.6981C24.6172 20.1751 26.6324 22.1903 29.1094 22.1903H34.9215C34.7171 28.9022 32.1704 32.3914 27.1537 32.8478C26.6911 32.8899 26.3367 33.2779 26.3367 33.7425V42.6758C26.3367 42.9229 26.4384 43.159 26.6179 43.3287C26.7852 43.4868 27.0061 43.5742 27.2351 43.5742C27.2519 43.5742 27.2687 43.5738 27.2855 43.5728C33.4765 43.2245 38.2026 41.0939 41.3325 37.24C44.4296 33.4265 46 27.8542 46 20.6777V6.91797C46 4.44098 43.9848 2.42578 41.5078 2.42578ZM44.2031 20.6777C44.2031 33.8528 38.9441 40.7426 28.1336 41.7099V34.5371C30.8659 34.1121 32.9793 32.8403 34.4233 30.7492C35.955 28.531 36.7317 25.3491 36.7317 21.2919C36.7317 20.7958 36.3295 20.3935 35.8333 20.3935H29.1094C27.6232 20.3935 26.4141 19.1843 26.4141 17.6981V6.91797C26.4141 5.43177 27.6232 4.22266 29.1094 4.22266H39.8906V10.8741C39.8906 11.3703 40.2929 11.7726 40.7891 11.7726C41.2853 11.7726 41.6875 11.3703 41.6875 10.8741V4.2293C43.0901 4.3222 44.2031 5.49224 44.2031 6.91797V20.6777Z" />
    <path d="M40.7891 13.0947C40.2929 13.0947 39.8906 13.5014 39.8906 13.9976C39.8906 14.4937 40.2929 14.896 40.7891 14.896C41.2852 14.896 41.6875 14.4937 41.6875 13.9976V13.9887C41.6875 13.4926 41.2853 13.0947 40.7891 13.0947Z" />
    <path d="M20.4844 12.7275C19.9882 12.7275 19.5859 13.1299 19.5859 13.626V13.6448C19.5859 14.1409 19.9882 14.5432 20.4844 14.5432C20.9806 14.5432 21.3828 14.1409 21.3828 13.6448V13.626C21.3828 13.1299 20.9806 12.7275 20.4844 12.7275Z" />
    </svg>';
    return $quote_icon;
  }
  public static function quote_icon2(){
    $quote_icon2 = '<svg width="56" height="57" viewBox="0 0 56 57" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g clip-path="url(#clip0_375:665)">
        <path d="M55.9876 17.6591C55.9876 17.653 55.9882 17.647 55.9882 17.6409C55.9882 10.2785 50.02 4.3103 42.6576 4.3103C35.2953 4.3103 29.3271 10.2784 29.3271 17.6409C29.3271 25.0034 35.2959 30.9715 42.6577 30.9715C44.1708 30.9715 45.6192 30.7077 46.9744 30.243C43.9753 47.4483 30.5584 58.5439 42.9957 49.412C56.7869 39.2857 56.003 18.0476 55.9876 17.6591Z" fill="#EE0034" />
        <path d="M13.3306 30.9714C14.8437 30.9714 16.2921 30.7076 17.648 30.2429C14.648 47.4482 1.23112 58.5438 13.6685 49.4119C27.4598 39.2857 26.676 18.0476 26.6604 17.6591C26.6604 17.653 26.6611 17.647 26.6611 17.6409C26.6611 10.2785 20.693 4.3103 13.3306 4.3103C5.96811 4.3103 0 10.2784 0 17.6409C0 25.0034 5.96877 30.9714 13.3306 30.9714Z" fill="#EE0034" />
      </g>
      <defs>
        <clipPath id="clip0_375:665">
          <rect width="56" height="56" fill="white" transform="translate(0 0.5)" />
        </clipPath>
      </defs>
    </svg>';
    return $quote_icon2;
  }
  
}
