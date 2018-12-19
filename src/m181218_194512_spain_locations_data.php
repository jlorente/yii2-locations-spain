<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */
use jlorente\location\db\Country;
use jlorente\location\db\Region;
use jlorente\location\db\State;
use jlorente\location\exceptions\SaveException;
use yii\db\Migration;

/**
 * Location module tables creation.
 * 
 * To apply this migration run:
 * ```bash
 * $ ./yii migrate --migrationPath=@vendor/jlorente/yii2-locations-spain/src/migrations
 * ```
 * 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class m181218_194512_spain_locations_data extends Migration
{

    /**
     * Id of the created country.
     * 
     * @var int
     */
    protected $countryId;

    /**
     * @inheritdoc
     */
    public function up()
    {
        $trans = Yii::$app->db->beginTransaction();
        try {
            $this->loadCountry();
            $this->integrateStates();
            $this->updateRegions();
            $this->updateCities();
            $this->updateLocations();
            $trans->commit();
        } catch (\Exception $ex) {
            $trans->rollback();
            throw $ex;
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        return true;
    }

    /**
     * Integrates the country registry.
     */
    protected function loadCountry()
    {
        $country = Country::findOne([
                    'code' => 'es'
        ]);
        $this->countryId = $country->id;
    }

    /**
     * Integrates the regions registries.
     */
    protected function integrateStates()
    {
        $states = [
            ['_id' => 1, 'name' => 'Andalucía'],
            ['_id' => 2, 'name' => 'Aragón'],
            ['_id' => 3, 'name' => 'Principado de Asturias'],
            ['_id' => 4, 'name' => 'Islas Baleares'],
            ['_id' => 5, 'name' => 'Canarias'],
            ['_id' => 6, 'name' => 'Cantabria'],
            ['_id' => 7, 'name' => 'Castilla y León'],
            ['_id' => 8, 'name' => 'Castilla - La Mancha'],
            ['_id' => 9, 'name' => 'Cataluña'],
            ['_id' => 10, 'name' => 'Comunitat Valenciana'],
            ['_id' => 11, 'name' => 'Extremadura'],
            ['_id' => 12, 'name' => 'Galicia'],
            ['_id' => 13, 'name' => 'Comunidad de Madrid'],
            ['_id' => 14, 'name' => 'Región de Murcia'],
            ['_id' => 15, 'name' => 'Comunidad Foral de Navarra'],
            ['_id' => 16, 'name' => 'País Vasco'],
            ['_id' => 17, 'name' => 'La Rioja'],
            ['_id' => 18, 'name' => 'Ceuta'],
            ['_id' => 19, 'name' => 'Melilla'],
        ];

        foreach ($states as $sData) {
            $state = new State([
                'name' => $sData['name'],
                'country_id' => $this->countryId
            ]);
            if ($state->save() === false) {
                throw new SaveException($state);
            }
        }
    }

    /**
     * Updates the regions registries.
     */
    protected function updateRegions()
    {
        $regions = [
            ['_stateId' => 1, 'name' => 'Almería'],
            ['_stateId' => 1, 'name' => 'Cádiz'],
            ['_stateId' => 1, 'name' => 'Córdoba'],
            ['_stateId' => 1, 'name' => 'Granada'],
            ['_stateId' => 1, 'name' => 'Huelva'],
            ['_stateId' => 1, 'name' => 'Jaén'],
            ['_stateId' => 1, 'name' => 'Málaga'],
            ['_stateId' => 1, 'name' => 'Sevilla'],
            ['_stateId' => 2, 'name' => 'Huesca'],
            ['_stateId' => 2, 'name' => 'Teruel'],
            ['_stateId' => 2, 'name' => 'Zaragoza'],
            ['_stateId' => 3, 'name' => 'Asturias'],
            ['_stateId' => 4, 'name' => 'Islas Baleares'],
            ['_stateId' => 5, 'name' => 'Las Palmas'],
            ['_stateId' => 5, 'name' => 'Santa Cruz de Tenerife'],
            ['_stateId' => 6, 'name' => 'Cantabria'],
            ['_stateId' => 7, 'name' => 'Ávila'],
            ['_stateId' => 7, 'name' => 'Burgos'],
            ['_stateId' => 7, 'name' => 'León'],
            ['_stateId' => 7, 'name' => 'Palencia'],
            ['_stateId' => 7, 'name' => 'Salamanca'],
            ['_stateId' => 7, 'name' => 'Segovia'],
            ['_stateId' => 7, 'name' => 'Soria'],
            ['_stateId' => 7, 'name' => 'Valladolid'],
            ['_stateId' => 7, 'name' => 'Zamora'],
            ['_stateId' => 8, 'name' => 'Albacete'],
            ['_stateId' => 8, 'name' => 'Ciudad Real'],
            ['_stateId' => 8, 'name' => 'Cuenca'],
            ['_stateId' => 8, 'name' => 'Guadalajara'],
            ['_stateId' => 8, 'name' => 'Toledo'],
            ['_stateId' => 9, 'name' => 'Barcelona'],
            ['_stateId' => 9, 'name' => 'Girona'],
            ['_stateId' => 9, 'name' => 'Lleida'],
            ['_stateId' => 9, 'name' => 'Tarragona'],
            ['_stateId' => 10, 'name' => 'Alicante'],
            ['_stateId' => 10, 'name' => 'Castellón'],
            ['_stateId' => 10, 'name' => 'Valencia'],
            ['_stateId' => 11, 'name' => 'Badajoz'],
            ['_stateId' => 11, 'name' => 'Cáceres'],
            ['_stateId' => 12, 'name' => 'A Coruña'],
            ['_stateId' => 12, 'name' => 'Lugo'],
            ['_stateId' => 12, 'name' => 'Ourense'],
            ['_stateId' => 12, 'name' => 'Pontevedra'],
            ['_stateId' => 13, 'name' => 'Madrid'],
            ['_stateId' => 14, 'name' => 'Murcia'],
            ['_stateId' => 15, 'name' => 'Navarra'],
            ['_stateId' => 16, 'name' => 'Álava'],
            ['_stateId' => 16, 'name' => 'Bizkaia'],
            ['_stateId' => 16, 'name' => 'Gipuzkoa'],
            ['_stateId' => 17, 'name' => 'La Rioja'],
            ['_stateId' => 18, 'name' => 'Ceuta'],
            ['_stateId' => 19, 'name' => 'Melilla']
        ];

        foreach ($regions as $rData) {
            $region = Region::findOne([
                        'name' => $rData['name'],
            ]);
            $region->state_id = $rData['_stateId'];
            if ($region->save() === false) {
                throw new SaveException($region);
            }
        }
    }

    /**
     * Updates the cities registries.
     */
    protected function updateCities()
    {
        $this->execute(<<<SQL
UPDATE jl_loc_city jlc 
    INNER JOIN jl_loc_region jlr ON jlr.id = jlc.region_id
    INNER JOIN jl_loc_state jls ON jls.id = jlr.state_id
    INNER JOIN jl_loc_country jlco ON jlco.id = jls.country_id
    SET jlc.country_id = jlco.id, jlc.state_id = jls.id;
SQL
        );
    }

    /**
     * Updates the locations registries.
     */
    protected function updateLocations()
    {
        $this->execute(<<<SQL
UPDATE jl_loc_location jll 
    INNER JOIN jl_loc_region jlr ON jlr.id = jll.region_id
    SET jll.state_id = jlr.state_id;
SQL
        );
    }

}
