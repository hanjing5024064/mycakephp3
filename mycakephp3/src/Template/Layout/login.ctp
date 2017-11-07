<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_self" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout'])?>">登出</a></li>
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
            <div>
                <label>已授权菜单</label>
                <select>
                    <?php
                    if($this->request->session()->check('menuActions')){
                        $menus = $this->request->session()->read('menuActions');
                        if(count($menus) > 0){
                            foreach($menus as $menu){
                                echo "<option>{$menu['name']}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="role">
                    <option value="">角色切换</option>
                    <?php if(Cake\Core\Configure::read('debug')):?><option value="上帝">上帝</option><?php endif;?>
                    <?php if(Cake\Core\Configure::read('debug')):?><option value="集团公司管理员">集团公司管理员</option><?php endif;?>
                    <option value="园区管理员">园区管理员</option>
                    <option value="资产管理员">资产管理员</option>
                    <option value="招商负责人">招商负责人</option>
                </select>
            </div>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>

<script>
    $(function(){
        //app define
        var app = {
            'roleSelector' : $('#role'),
        }

        //select a new role
        app.changeRole = function(){
            console.log(app.roleSelector.val());
            $.ajax({
                url:'<?php echo $this->Url->build(['controller' => 'homepage', 'action' => 'changeRole']);?>',
                method:'post',
                data:{role:app.roleSelector.val()},
                success:function(data){
                    window.location.reload();
                }
            });
        }

        //set a selected role
        app.setRole = function(){
            app.roleSelector.find("option[value='<?php echo $this->request->session()->read('User.role')?>']").attr("selected",true);
        }

        //app init function, bind click function
        app.init = function(){
            app.setRole();
            app.roleSelector.change(app.changeRole);
        }

        //app init
        app.init();
    });
</script>
</body>
</html>
