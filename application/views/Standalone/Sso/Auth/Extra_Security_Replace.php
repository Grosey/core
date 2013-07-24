<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.2" />
        <title><?= $config_site_title ?></title>

        <!-- CSS -->
        <?= HTML::style("http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.css"); ?>
        <?= HTML::style("media/bootstrap/css/bootstrap.min.css"); ?>
        <?= HTML::style("media/bootstrap/css/bootstrap-responsive.min.css"); ?>
        <?= HTML::style("media/style/Standalone/design.css"); ?>
        <?= HTML::style("http://fonts.googleapis.com/css?family=Yellowtail"); ?>

        <!-- Javascript -->
        <?= HTML::script("http://code.jquery.com/jquery-1.9.1.min.js"); ?>
        <?= HTML::script("http://code.jquery.com/ui/1.10.1/jquery-ui.js"); ?>
        <?= HTML::script("media/bootstrap/js/bootstrap.min.js"); ?>
        <?= HTML::script("media/scripts/general.js"); ?>
    </head>
    <body>
        <div class="container container-header">
            <div class="row-fluid">
                <div class="span4 header-left">
                    <p align="left"><?= HTML::image("media/style/global/images/logo.png") ?></p>
                </div>
                <div class="span8 header-right">
                    <p align="right"><?= HTML::image("media/style/global/images/slogan.png"); ?></p>
                </div>
            </div>
        </div>
        <div class="container container-content">
            <div class="content">
                <h1>Extra Security - Now Expired</h1>
                <p>
                    <?=$_account->name_first." ".$_account->name_last?>,
                </p>
                <p>
                    Sorry to interrupt you, but this account is protected with a second layer of security.  This additional security has, however, expired.  Please complete the form below to reinstate your account.
                </p>
                <p>
                    Should you have any questions, comments or concerns, please contact <?= Html::anchor('http://helpdesk.vatsim-uk.co.uk/index.php?act=tickets&code=open&step=2&department=2', 'web-support][at][vatsim-uk.co.uk', array('target' => '_blank')) ?>.
                </p>
                <p>
                    Thanks,
                </p>
                <p class="signature-fancy">
                    The VATSIM-UK Web Team
                </p>
            </div>
            <div class="content">
                <h1>Change Extra Security Details</h1>
                <p>
                    <?php if(isset($_newReg)): ?>
                        An administrator has requested that you create a second password before continuing with your login.  You will not be able to use any services until this action has been completed.
                    <?php else: ?>
                        Your previous secondary password has expired, please enter your old password along with a new one below.  Remember though, they must be different!
                    <?php endif; ?>
                </p>

                <?php if(isset($error)): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Warning! An error occured:</strong>
                        <ul>
                            <li><?=$error?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(isset($_requirements)): ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Please note, your password must:</strong>
                        <ul>
                            <?php foreach($_requirements as $r): ?>
                                <li><?=$r?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row-fluid">
                    <div class="span6 offset2">
                        <form class="form-horizontal form-login" method="POST" action="<?= URL::site("sso/auth/extra_security_replace") ?>">
                            <?php if(!isset($_newReg)): ?>
                                <div class="control-group">
                                    <label class="control-label" for="old_password">Old Password</label>
                                    <div class="controls">
                                        <input type="password" id="old_password" name="old_password" placeholder="Old Password">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="control-group">
                                <label class="control-label" for="new_password">New Password</label>
                                <div class="controls">
                                    <input type="password" id="new_password" name="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="new_password2">Confirm New Password</label>
                                <div class="controls">
                                    <input type="password" id="new_password2" name="new_password2" placeholder="Confirm New Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn" name="processextra_security_replace" value="extra_security_replace">Change Security Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>