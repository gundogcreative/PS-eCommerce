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
                <div id="branchesMessage" class="flashSession successSession dataList"><?php $this->flashSession->output() ?></div>
                <table id="branches" class="dataList">
                    <thead>
                        <tr>
                            <th width="150">Branch Name</th>
                            <th width="150">Metro Id</th>
                            <th width="150">Abbreviation</th>
                            <th width="150">Region</th>
                            <th width="100">Active</th>
                            <th width="30"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pageInfo->items as $b) { ?>
                        <tr>
                            <td><?php echo $this->escaper->escapeHtml($b->branchName); ?></td>
                            <td><?php echo $this->escaper->escapeHtml($b->metroId); ?></td>
                            <td><?php echo $this->escaper->escapeHtml($b->abbreviation); ?></td>
                            <td><?php echo $this->escaper->escapeHtml($b->regions->regionName); ?></td>
                            <?php if ($b->isActive == 1) { ?>
                                <td>Yes</td>
                            <?php } else { ?>
                                <td>No</td>
                            <?php } ?>
                            <td><a href='branches/edit/?id=<?php echo $b->id; ?>'><?php echo $this->tag->image(array('img/edit.png', 'class' => 'editIcon', 'name' => $b->id)); ?></a></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php if ($pageInfo->total_pages > 1) { ?>
                                <td></td>
                                <td></td>
                                <td><a href="/branches">First</a></td>
                                <td><a href="/branches/?page=<?php echo $pageInfo->before; ?>"><?php echo $this->tag->image(array('img/previousIcon.png', 'class' => 'navigationIcon')); ?><?php echo $this->tag->image(array('img/previousIcon.png', 'class' => 'navigationIcon')); ?></a> <a href="/branches/?page=<?php echo $pageInfo->next; ?>"><?php echo $this->tag->image(array('img/nextIcon.png', 'class' => 'navigationIcon')); ?><?php echo $this->tag->image(array('img/nextIcon.png', 'class' => 'navigationIcon')); ?></a></td>
                                <td><a href="/branches/?page=<?php echo $pageInfo->last; ?>">Last</a></td>
                                <td><a href="branches/new"><?php echo $this->tag->image(array('img/addIcon.png', 'class' => 'addIcon')); ?></a></td>
                            <?php } else { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
