<?php
/**
 * Created by PhpStorm.
 * User: isidoris-simplon
 * Date: 28/07/17
 * Time: 07:45
 */

class Game
{
    private $id;
    private $playerA;
    private $playerB;
    private $boatA;
    private $boatB;
    private $shootA;
    private $shootB;

    /**
     * Game constructor.
     * @param $id
     * @param $playerA
     * @param $playerB
     * @param $boatA
     * @param $boatB
     * @param $shootA
     * @param $shootB
     */
    public function __construct($id, $playerA, $playerB, $boatA, $boatB, $shootA = [], $shootB = [])
    {
        $this->id = $id;
        $this->playerA = $playerA;
        $this->playerB = $playerB;
        $this->boatA = $boatA;
        $this->boatB = $boatB;
        $this->shootA = $shootA;
        $this->shootB = $shootB;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPlayerA()
    {
        return $this->playerA;
    }

    /**
     * @return mixed
     */
    public function getPlayerB()
    {
        return $this->playerB;
    }

    /**
     * @return mixed
     */
    public function getBoatA()
    {
        return $this->boatA;
    }

    /**
     * @return mixed
     */
    public function getBoatB()
    {
        return $this->boatB;
    }

    /**
     * @return array
     */
    public function getShootA()
    {
        return $this->shootA;
    }

    /**
     * @return array
     */
    public function getShootB()
    {
        return $this->shootB;
    }
}