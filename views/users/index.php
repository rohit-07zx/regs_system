 
 <?php 
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $users app\models\User[] */

?>

<div class="user-index">
    <h1>Users List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= Html::encode($user->username) ?></td>
                    <td><?= Html::encode($user->email) ?></td>
                    <td><?= Html::encode($user->countryCode.$user->phone) ?></td>
                    <td><?= Html::encode($user->gender) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
