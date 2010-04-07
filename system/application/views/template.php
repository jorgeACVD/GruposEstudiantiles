<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>GruposEstudiantiles :: <?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/demo_table_jui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jquery-ui-smoothness.css">
        <?php if (isset($javascript)) echo $javascript; ?>

    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <p class="title">Grupos Estudiantiles</p>
            </div>
            <div id="middle">
                <div id="left">
                    <div id="menu">
                        <?php echo Menu::getInstance()->buildHtml('default') ?>
                    </div>

                    <?php if(Menu::getInstance()->isMenuDefined('submenu')) : ?>
                    <div id="submenu">
                        <?php echo Menu::getInstance()->buildHtml('submenu') ?>
                    </div>
                    <?php endif ?>

                    <div id="content">
                        <?php $this->load->view($view) ?>
                    </div>
                </div>
                <div id="right">
                    right
                </div>
                <div id="footer">
                    Grupos Estudiantiles
                </div>
            </div>
        </div>
    </body>
</html>