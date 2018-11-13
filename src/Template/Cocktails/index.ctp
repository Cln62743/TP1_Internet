<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>
<div class="tournaments index content">
    <thead>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="basic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="index.js"></script>
        <title>Crud PHP Ajax Example</title>
    </thead>
    <tbody>
        <div class="container">
            <div class="row">
                <div class="panel panel-default cocktails-content">
                    <div class="panel-heading">Cocktails <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel">Add Cocktail</h2>
                        <form class="form" id="cocktailForm">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" id="description"/>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="cocktailAction('add')">Add Cocktail</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="editForm">
                        <h2 id="actionLabel">Edit Cocktail</h2>
                        <form class="form" id="cocktailForm">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="nameEdit"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" id="descriptionEdit"/>
                            </div>
                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="cocktailAction('edit')">Update Cocktail</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cocktailData">
                            <?php
                            include 'db.php';
                            $db = new DB();
                            $cocktails = $db->getRows('cocktails', array('order_by' => 'id DESC'));
                            if (!empty($cocktails)): $count = 0;
                                foreach ($cocktails as $cocktail): $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo '#' . $count; ?></td>
                                        <td><?php echo $cocktail['name']; ?></td>
                                        <td><?php echo $cocktail['description']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCocktail('<?php echo $cocktail['id']; ?>')"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? cocktailAction('delete', '<?php echo $cocktail['id']; ?>') : false;"></a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr><td colspan="5">No cocktail(s) found......</td></tr>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </tbody>
</div>
