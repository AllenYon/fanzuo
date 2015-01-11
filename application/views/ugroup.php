<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>小饭桌列表</title>
    <style type="text/css">
        .action {
            margin-left: 10px;
            float: left;
            display: inline;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script>
        function action_logout(id) {
            $.ajax({
                url: "<?php echo site_url('login/logout');?>",
                data: null,
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    if (json.code == 1001) {
                        self.location = "<?php echo site_url('/index');?>";
                    } else {

                    }

                    alert("ok");
                },
                error: function () {
                    alert('There was a problem');
                    return false;
                }
            });
        }
    </script>
</head>
<body>

<!--<h1>小饭桌列表</h1>-->

<button type="button" value="退出" onclick="action_logout(this.id)">退出</button>

<p>
    <?php echo '用户名Id: ' . $this->session->userdata('user_id'); ?>
</p>

<p>
    <?php echo '用户名: ' . $this->session->userdata('username'); ?>
</p>

<p>
    <?php echo '手机号码: ' . $this->session->userdata('phone'); ?>
</p>


<?php echo form_open('ugroup/create'); ?>
<input type="submit" name="submit" value="创建新饭桌">
</form>


<table>
    <tr>
        <th>创建者ID</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php foreach ($result as $item): ?>
        <tr>
            <td><?php echo $item->owner_user_id; ?></td>
            <td><?php echo $item->create_time; ?></td>
            <td>
                <div class="action">
                    <?php echo form_open('ugroup/detail?group_id=' . $item->id) ?>
                    <!--                --><?php //echo form_hidden('group_id',$item->id)?>
                    <?php echo form_submit('submit', '查看') ?>
                    <?php echo form_close() ?>
                </div>
                <div class="action">

                    <?php echo form_open('ugroup/add') ?>
                    <?php echo form_hidden('group_id', $item->id) ?>
                    <?php echo form_submit('submit', '加入') ?>
                    <?php echo form_close() ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>