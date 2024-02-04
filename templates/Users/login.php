<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<div class="container">
    <h1 class="mb-3">Login</h1>
    <?= $this->Form->create(null, ['class' => 'mb-3']) ?>
    <div class="mb-3">
        <?= $this->Form->label('email', 'Email', ['class' => 'form-label']) ?>
        <?= $this->Form->text('email', ['class' => 'form-control', 'required' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->label('password', 'Password', ['class' => 'form-label']) ?>
        <?= $this->Form->password('password', ['class' => 'form-control', 'required' => true]) ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="btn-group" role="group">
            <?= $this->Form->button('Login', ['class' => 'btn btn-primary me-2']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Html->link('Register', ['action' => 'add'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>
