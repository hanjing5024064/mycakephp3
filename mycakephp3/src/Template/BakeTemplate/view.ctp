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
%>
<?php
/**
  * @var \<%= $namespace %>\View\AppView $this
  * @var \<%= $namespace %>\Model\Entity\<%= $entityClass %> $<%= $singularVar %>
  */
?>
<%
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>

<!-- Content Header -->
<section class="content-header">
    <h1><?= __('<%= $pluralHumanName %>')?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('<%= $pluralHumanName %>')?></a></li>
        <li class="active"><?= __('<%= $pluralHumanName %>')?> details</li>
    </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= __('<%= $pluralHumanName %>')?> details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered view-t">
                <tbody>
                <% if ($groupedFields['string']) : %>
                <% foreach ($groupedFields['string'] as $field) : %>
                <% if (isset($associationFields[$field])) :
                $details = $associationFields[$field];
                %>
                <tr>
                    <th scope="row"><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
                    <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                </tr>
                <% else : %>
                <tr>
                    <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                    <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                </tr>
                <% endif; %>
                <% endforeach; %>
                <% endif; %>
                <% if ($associations['HasOne']) : %>
                <%- foreach ($associations['HasOne'] as $alias => $details) : %>
                <tr>
                    <th scope="row"><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
                    <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                </tr>
                <%- endforeach; %>
                <% endif; %>
                <% if ($groupedFields['number']) : %>
                <% foreach ($groupedFields['number'] as $field) : %>
                <tr>
                    <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                    <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                </tr>
                <% endforeach; %>
                <% endif; %>
                <% if ($groupedFields['date']) : %>
                <% foreach ($groupedFields['date'] as $field) : %>
                <tr>
                    <th scope="row"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
                    <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                </tr>
                <% endforeach; %>
                <% endif; %>
                <% if ($groupedFields['boolean']) : %>
                <% foreach ($groupedFields['boolean'] as $field) : %>
                <tr>
                    <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                    <td><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></td>
                </tr>
                <% endforeach; %>
                <% endif; %>


                </tbody></table>


        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index',<%= $pk %>]) ?>">返回</a>
        </div>
    </div>
</section>