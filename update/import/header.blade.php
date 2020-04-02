<div class="header-outer">
    <header class="comman-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col comman-header-col-left">
                    <div class="logoname-wrap">
                        <a href="<?= base_url() . "machine" ?>" target="_self">
                            <img src="images/logo.png" alt="WebApp" />
                        </a>
                    </div>
                </div>
                <div class="col top-nav-xs-wrap st comman-header-col-right">
                    <?php
                    if (!empty($machineName)) { ?>
                        <ul class="nav-top-right list-inline left-side-nav-wrap">
                            <li class="list-inline-item">
                                <div class="header-input-group input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <h4 style="color:#fff"><?= $machineName ?></h4>
                                    </div>
                                </div>
                            </li>_____
                            <?php if (!empty($currentBatch)) { ?>
                                <li class="list-inline-item">
                                    <div class="header-input-group input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <h5 style="color:#fff">Batch No: <?= $currentBatch->batch_no ?></h5>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <ul class="nav-top-right list-inline right-side-nav-wrap">
                        <!-- <li class="nav-item list-inline-item nav-notification">
                            <a class="nav-link" href="<?= base_url() . "machine" ?>" data-toggle="tooltip" title="Reports">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            </a>
                        </li> -->
                        <li class="nav-item list-inline-item nav-notification">
                            <a class="nav-link" href="<?= base_url() . "machine/setting" ?>" data-toggle="tooltip" title="Setting">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item list-inline-item nav-notification">
                            <a class="nav-link" href="<?= base_url() . "user/logout" ?>" data-toggle="tooltip" title="Log Out">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>