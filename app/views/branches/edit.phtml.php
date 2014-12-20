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
                <div class="editingForm">
                <h3>Edit</h3>
                <?php echo $this->tag->form(array('branches/save', 'method' => 'post')); ?>
                <div class="flashSession errorSession"><?php $this->flashSession->output() ?></div>
                <?php echo $this->tag->hiddenField(array("id")) ?>
                <div class="row">
                    <div class="small-4 columns">
                        <label>Branch Name<small>required</small>
                        <?php echo $this->tag->textField(array("branchName", "size" => "30")) ?>
                    </label>
                    </div>
                </div>

                <div class="row">
                    <div class="small-4 columns">
                        <label>Metro Id<small>required</small>
                        <?php echo $this->tag->textField(array("metroId", "size" => "3", "maxlength" => 3)) ?>
                    </label>
                    </div>
                </div>

                <div class="row">
                    <div class="small-4 columns">
                        <label>Abbreviation<small>required</small>
                        <?php echo $this->tag->textField(array("abbreviation", "size" => "10")) ?>
                    </label>
                    </div>
                </div>

                <div class="row">
                    <div class="small-2 columns">
                        <label>Region
                            <?php echo $this->tag->select(array("regionId", Regions::find(array("order" => "regionName ASC")), 'using' => array('id', 'regionName'))) ?>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="small-2 columns">
                        <label>Is Active?
                        <?php echo $this->tag->select(array("isActive",array(0 => "No", 1 => "Yes"))) ?>
                        </label>
                    </div>
                </div>

                <?php echo $this->tag->submitButton(array('Update')); ?> 
                </div>
            </div>
        </div>
    </body>
</html>