<?php

namespace PDEV\ScheduledEvents;

class View
{
    public function boot()
    {
        add_action('admin_menu', array($this, 'submenuPage'));
    }
    public function submenuPage()
    {
        add_submenu_page(
            'tools.php',
            'Scheduled Events',
            'Scheduled Events',
            'manage_options',
            'pdev-scheduled-events',
            array($this, 'template')
        );
    }

    public function template()
    {
        $cron = _get_cron_array();
        $schedules = wp_get_schedules();
        $date_format = 'M j, Y @ G:i';
?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo esc_html__("Scheduled Events", "textdomain"); ?></h1>
            <table class="widefat fixed striped">
                <thead>
                    <th><?php echo esc_html__("Next Run (GMT/UTC)", "textdomain"); ?></th>
                    <th><?php echo esc_html__("Schedule", "textdomain"); ?></th>
                    <th><?php echo esc_html__("Hook", "textdomain"); ?></th>
                </thead>
                <tbody>
                    <?php
                    foreach ($cron as $timestamp => $hooks) :
                        foreach ((array) $hooks as $hook => $events) :
                            foreach ((array) $events as $event) : ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo date_i18n(
                                            $date_format,
                                            wp_next_scheduled($hook)
                                        );
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($event['schedule']) : ?>
                                            <?php
                                            $event_display = isset($schedules[$event['schedule']]['display']) ? $schedules[$event['schedule']]['display'] : '';
                                            echo esc_html($event_display);
                                            ?>
                                        <?php else : ?>
                                            Once
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <code><?php echo esc_html($hook); ?></code>
                                    </td>
                                </tr>
                    <?php
                            endforeach;
                        endforeach;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
<?php
    }
}
