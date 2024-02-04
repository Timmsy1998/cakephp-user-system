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
<div class="container py-5">
    <h1 class="text-center mb-4">Welcome,
        <?= h($user->email) ?>
    </h1>
    <p class="text-center mb-4">This is your dashboard.</p>
    <hr>
    <div class="row justify-content-center">
        <!-- Registered Users -->
        <div class="col-md-6 mb-4">
            <div class="card mb-4 shadow" style="border-radius: 12px; background-color: #f8f9fa;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #6c757d;"><i class="bi bi-person-circle"
                            style="font-size: 1.2rem;"></i> Registered Users</h5>
                    <p class="card-text text-center" style="font-size: 1.5rem; color: #6c757d;">
                        <strong id="userCount">0</strong>
                    </p>
                </div>
            </div>
        </div>
        <!-- Active Users -->
        <div class="col-md-6 mb-4">
            <div class="card shadow" style="border-radius: 12px; background-color: #f8f9fa;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #6c757d;">
                        <i class="bi bi-person-check-fill" style="font-size: 1.2rem;"></i> Active Users
                    </h5>
                    <p class="card-text text-center" style="font-size: 1.5rem; color: #6c757d;">
                        <strong id="activeUserCount">0</strong>
                    </p>
                </div>
            </div>
        </div>
        <!-- New Users -->
        <div class="col-md-6 mb-4">
            <div class="card shadow" style="border-radius: 12px; background-color: #f8f9fa;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #6c757d;">
                        <i class="bi bi-person-plus-fill" style="font-size: 1.2rem;"></i> New Users
                    </h5>
                    <p class="card-text text-center" style="font-size: 1.5rem; color: #6c757d;">
                        <strong id="newUserCount">0</strong>
                    </p>
                </div>
            </div>
        </div>
        <!-- Unique IP Visitors -->
        <div class="col-md-6 mb-4">
            <div class="card shadow" style="border-radius: 12px; background-color: #f8f9fa;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #6c757d;">
                        <i class="bi bi-globe2" style="font-size: 1.2rem;"></i> Unique IP Visitors
                    </h5>
                    <p class="card-text text-center" style="font-size: 1.5rem; color: #6c757d;">
                        <strong id="uniqueIpCount">0</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var userCount = <?= h($userCount) ?>;
    var newUserCount = <?= h($newUserCount) ?>;
    var activeUserCount = <?= h($activeUserCount) ?>;
    var uniqueIpCount = <?= h($uniqueIpCount) ?>;

    function animateCountUp(elementId, finalCount) {
        var currentCount = 0;
        var increment = finalCount > 100 ? Math.ceil(finalCount / 100) : 1;

        var counter = setInterval(function () {
            currentCount += increment;
            if (currentCount >= finalCount) {
                currentCount = finalCount;
                clearInterval(counter);
            }
            document.getElementById(elementId).innerText = currentCount;
        }, 10);
    }

    animateCountUp('userCount', userCount);
    animateCountUp('newUserCount', newUserCount);
    animateCountUp('activeUserCount', activeUserCount);
    animateCountUp('uniqueIpCount', uniqueIpCount);
</script>
