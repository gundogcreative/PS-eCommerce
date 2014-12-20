<!DOCTYPE html>
<html>
    <head>

   	<meta charset="utf-8" />   
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title; ?></title>

	<meta name="description" content="" />
	<meta property="og:site_name" content="" /> 

    <!-- CSS -->
    <?php echo $this->assets->outputCss(); ?>

    </head>
    <body>

    <!-- JS -->
    <?php echo $this->assets->outputJs(); ?>

        <div class="pageContent">

            <header>
                <?php echo $headerHtml; ?> 
            </header>

            <div class="content">
                <table id="controlPanel" class="controlPanelTable">
                    <thead>
                        <tr>
                            <th width="150">Sections</th>
                            <th width="10"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="branches">Branches</a></td>
                            <td><a href="branches"><?php echo $this->tag->image(array('img/pageIcon.png', 'class' => 'controlPanelIcon')); ?></a></td>
                        </tr>
                        <tr>
                            <td><a href="drivers">Drivers</a></td>
                            <td><a href="drivers"><?php echo $this->tag->image(array('img/pageIcon.png', 'class' => 'controlPanelIcon')); ?></a></td>
                        </tr>
                        <tr>
                            <td><a href="hangs">Hangs</a></td>
                            <td><a href="hangs"><?php echo $this->tag->image(array('img/pageIcon.png', 'class' => 'controlPanelIcon')); ?></a></td>
                        </tr>
                        <tr>
                            <td><a href="regions">Regions</a></td>
                            <td><a href="regions"><?php echo $this->tag->image(array('img/pageIcon.png', 'class' => 'controlPanelIcon')); ?></a></td>
                        </tr>
                        <tr>
                            <td><a href="cheetahout">Send To Cheetah</a></td>
                            <td><a href="cheetahout"><?php echo $this->tag->image(array('img/pageIcon.png', 'class' => 'controlPanelIcon')); ?></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
