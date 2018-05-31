<aside class="main-sidebar">
    <div class="sidebar">
        <ul class="sidebar-menu">
            <!--
            <li class="treeview" data-ctrl="Pages">
                <a href="<?php //echo $this->Url->build(['controller' => 'HomepagePC', 'action' => 'homepage']) ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>控制面板</span>
                </a>
            </li>
            -->
            <?php
            $nowMenu = $this->request->session()->read('nowMenu');
            $i = 0;
            if($this->request->session()->check('menuActions')){
            foreach ($this->request->session()->read('menuActions') as $menu):
                if(array_key_exists('childMenu', $menu)) {
                    ?>
                    <li class="treeview <?php if ($i === $nowMenu[0]) echo "active"; ?>" data-ctrl="Pages">
                        <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'display']) ?>">
                            <i class="fa <?= $menu['icon'] ?>"></i>
                            <span><?= $menu['name']; ?></span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <?php $j = 0;
                            foreach ($menu['childMenu'] as $childMenu): ?>
                                <li data-ctrl="#"
                                    <?php
                                    if ($j === $nowMenu[1]) echo "class=\"active\"";
                                    ?>>
                                    <a href="<?= $this->Url->build(['controller' => $childMenu['controller'], 'action' => $childMenu['action']]); ?>">
                                        <i class="fa <?= $childMenu['icon'] ?>"></i><?= $childMenu['name'] ?>
                                    </a>
                                </li>
                                <?php $j++; endforeach ?>
                        </ul>
                    </li>
                    <?php
                    $i++;
                }else{

                    }
            endforeach;
            }
            ?>

<!--            基础样式pages-base-->
<!--            地图pages-baseMap-->
        </ul>
    </div>
</aside>