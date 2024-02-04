<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VisitorIpsFixture
 */
class VisitorIpsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'ip_address' => 'Lorem ipsum dolor sit amet',
                'visit_time' => 1707069604,
            ],
        ];
        parent::init();
    }
}
