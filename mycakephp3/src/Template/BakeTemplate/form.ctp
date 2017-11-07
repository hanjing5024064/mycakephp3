<%
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
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->hasBehavior('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
%>
<!-- Content Header -->
<?= $this->element('content_header');?>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">

    <?= $this->Form->create($<%= $singularVar %>) ?>
        <div class="box-body">
            <?php
<%
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {

            %>
            ?>

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        <%

                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
%>
            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true, 'class'=>'form-control']);
<%
                } else {
%>
            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'class'=>'form-control']);
<%
                }

                        %>
                        ?>
                    </div>
                </div>
            </div>

            <%

                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {

            %>
            ?>

            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        <%

                $fieldData = $schema->column($field);
                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
%>
            echo $this->Form->control('<%= $field %>', ['empty' => true, 'class'=>'form-control']);
<%
               } else if(in_array($fieldData['type'], ['int','tinyint','boolean'])){
%>
            echo $this->Form->control('<%= $field %>',['class'=>'form-control']);
<%
                } else {
%>
            echo $this->Form->control('<%= $field %>',['class'=>'form-control']);
<%
                }
                        %>
                        ?>
                    </div>
                </div>
            </div>

            <%
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
            <div class='row'>
                <div class="col-md-3">
                    <div class="form-group">
            <?php
            echo $this->Form->control('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'class'=>'form-control']);
            ?>
                    </div>
                </div>
            </div>
<%
            }
            }
%>

        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('提交'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
            <?= $this->Form->button(__('重置'), ['type' => 'reset', 'class' => 'btn']) ?>
        </div>

    <?= $this->Form->end() ?>

    </div>
</section>
<!-- /Main content -->
