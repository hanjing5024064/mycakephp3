<aside class="main-sidebar">
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview" data-ctrl="Pages">
                <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'display']) ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>控制面板</span>
                </a>
            </li>
            <?php
            $nowMenu = $this->request->session()->read('nowMenu');
            $i = 0;
            foreach ($this->request->session()->read('menuActions') as $menu):
                ?>
                <li class="treeview <?php if ($i === $nowMenu[0]) echo "active"; ?>" data-ctrl="Pages">
                    <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'display']) ?>">
                        <i class="fa <?= $menu['icon'] ?>"></i>
                        <span><?= $menu['name']; ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php $j=0;foreach ($menu['childMenu'] as $childMenu): ?>
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
            endforeach
            ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car"></i>
                    <span>车辆管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li data-ctrl="#">
                        <a href="#">
                            <i class="fa fa-link"></i>基础管理
                        </a>
                    </li>
                    <li data-ctrl="#">
                        <a href="#">
                            <i class="fa fa-link"></i>车载终端管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user "></i>
                    <span>会员管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li data-ctrl="#">
                        <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'member_list']) ?>">
                            <i class="fa fa-link"></i>会员列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user "></i>
                    <span>订单管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li data-ctrl="#">
                        <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'order_list']) ?>">
                            <i class="fa fa-link"></i>订单列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>基础样式</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li data-ctrl="#">
                        <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'base']) ?>">
                            <i class="fa fa-link"></i>基础样式
                        </a>
                    </li>
                    <li data-ctrl="#">
                        <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'base_map']) ?>">
                            <i class="fa fa-link"></i>地图
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>