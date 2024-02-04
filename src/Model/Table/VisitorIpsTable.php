<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitorIps Model
 *
 * @method \App\Model\Entity\VisitorIp newEmptyEntity()
 * @method \App\Model\Entity\VisitorIp newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\VisitorIp> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitorIp get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\VisitorIp findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\VisitorIp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\VisitorIp> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitorIp|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\VisitorIp saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\VisitorIp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VisitorIp>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VisitorIp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VisitorIp> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VisitorIp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VisitorIp>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VisitorIp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VisitorIp> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VisitorIpsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('visitor_ips');
        $this->setDisplayField('ip_address');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 255)
            ->requirePresence('ip_address', 'create')
            ->notEmptyString('ip_address');

        $validator
            ->dateTime('visit_time')
            ->requirePresence('visit_time', 'create')
            ->notEmptyDateTime('visit_time');

        return $validator;
    }
}
