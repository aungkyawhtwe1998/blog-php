<?php require_once "core/auth.php"?>
<?php include "template/header.php";?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="dashboard.html"><i class="feather-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if(isset($_POST['payNow'])){
if(payNow()){
    linkTo("wallet.php");
}
}
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-dollar-sign text-primary"></i> Wallet Manager
                    </h4>
                    <a href="<?php echo $url;?>/item_list.php" class="btn btn-outline-primary">
                        <i class="feather-user"></i>
                        Your Mone: $<?php echo user($_SESSION['user']['id'])['money']?>
                    </a>
                </div>
                <hr>

                <form method="post">
                    <div class="form-inline">
                        <select name="to_user" id="" class="form-control mr-2" required>
                            <option value="0" selected disabled>Select user</option>
                            <?php foreach(users() as $user){?>
                            <?php if ($user['id'] != $_SESSION['user']['id']){?>
                            <option value="<?php echo $user['id']; ?>">
                                <?php echo $user['name']?>
                            </option>
                            <?php } ?>
                            <?php } ?>

                        </select>
                        <input type="number" name="amount" min="100"
                            max="<?php echo user($_SESSION['user']['id'])['money']?>" class="form-control mr-2"
                            placeholder="Pay amount" required>
                        <input type="text" name="description" class="form-control mr-2" placeholder="Description"
                            required>

                        <button class="btn btn-primary" name="payNow"> Transfer </button>

                    </div>
                    <hr>
                </form>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>For What</th>
                            <th>Date / Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach(transitions() as $t){?>
                        <tr>
                            <td><?php echo $t['id'] ?></td>
                            <td><?php echo user($t['from_user'])['name']?></td>
                            <td><?php echo user($t['to_user'])['name']?></td>
                            <td><?php echo $t['amount']?></td>
                            <td><?php echo $t['description']?></td>
                            <td><?php echo date("d-m-Y / h:i",strtotime($t['created_at']))?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php";?>
<script>
    $(" .table").dataTable({
        "order": [
            [3, "desc"]
        ]
    });
</script>