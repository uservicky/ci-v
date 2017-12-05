<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>hello vicky this is html file</h1>
    <table border ='3'><?php foreach($users as $user):?>
        <tr>
            <td><?=$user['abc'];?></td>
            <td><?=$user['xyz'];?></td>
            <?php endforeach;?>
        </tr>
    </table>
    <table border ='3'><?php foreach($users1 as $user1){?>
        <tr>
            <td><?php echo $user1->id;?></td>
            <td><?php echo $user1->name;?></td>
            <td><?php echo $user1->class;?></td>
            <?php } ?>
        </tr>
    </table>
    <?php echo br(10); 
    echo heading('Welcome!', 1);?>
    <table border ='3'><?php foreach($users2 as $user2):?>
        <tr>
            <td><?=$user2['id'];?></td>
            <td><?=$user2['name'];?></td>
            <td><?=$user2['class'];?></td>
            <?php endforeach;?>
        </tr>
    </table>
</body>
</html>