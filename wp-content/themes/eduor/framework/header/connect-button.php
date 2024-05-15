<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;

?>

<!-- <div class="eduor_menu_right_buttons"> -->
<button class="site_btn btn-style-2" data-bs-toggle="modal" data-bs-target="#connectModal">
    <img src="<?php echo esc_url( Helper::get_img('connect_wallet.svg') ); ?>" alt="" />
    <?php echo esc_html( eduor::$options['connect_btn_txt'] ); ?>
    <span class="hover_overlay"></span>
</button>
<!-- </div> -->

<!-- Connect Wallet Modal -->
<div class="connect_modal"> 
    <div class="modal fade " id="connectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal_overlay">
                    <div class="modal_header">
                        <h2><?php esc_html_e('Connect Wallet', 'eduor'); ?></h2>
                        <button data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal_body text-center">
                        <p><?php esc_html_e('Please select a wallet to connect for start Minting your NFTs', 'eduor'); ?></p>
                        <div class="connect-section">
                             <ul class="heading-list">
                                <li><a href="#" onclick="Connect()">
                                    <span><img src="<?php echo esc_url( Helper::get_img('MetaMask.svg') ); ?>" alt="<?php esc_attr_e( 'Meta mask Image', 'eduor' ); ?>"></span>
                                    <?php esc_html_e('MetaMask', 'eduor'); ?></a>
                                </li>
                                <li><a href="#">
                                    <span><img src="<?php echo esc_url( Helper::get_img('Formatic.svg') ); ?>" alt="<?php esc_attr_e( 'Formatic', 'eduor' ); ?>"></span>
                                    <?php esc_html_e('Coinbase', 'eduor'); ?></a>
                                </li>
                                <li><a href="#">
                                    <span><img src="<?php echo esc_url( Helper::get_img('Trust_Wallet.svg') ); ?>" alt="<?php esc_attr_e( 'Trust Wallet', 'eduor' ); ?>"></span>
                                    <?php esc_html_e('Trust Wallet', 'eduor'); ?></a>
                                </li>
                                <li><a href="#">
                                    <span><img src="<?php echo esc_url( Helper::get_img('WalletConnect.svg') ); ?>" alt="<?php esc_attr_e( 'Wallet Connect', 'eduor' ); ?>"></span>
                                    <?php esc_html_e('WalletConnect', 'eduor'); ?></a>
                                </li>
                            </ul>
                        </div>
                        <p><?php esc_html_e('By connecting your wallet, you agree to our', 'eduor'); ?> <a href="#"><?php esc_html_e('Terms of Service', 'eduor'); ?></a> <?php esc_html_e('and our', 'eduor'); ?> <a href="#"><?php esc_html_e('Privacy Policy', 'eduor'); ?></a>.</p>
                    </div>
                    <div class="modal_bottom_shape">
                         <span class="modal_bottom_shape_left"></span>
                        <span class="modal_bottom_shape_right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Connect Wallet Modal -->