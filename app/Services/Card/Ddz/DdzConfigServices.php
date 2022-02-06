<?php

namespace App\Services\Card\Ddz;

use App\Enum\CardEnum;
use App\Services\Card\BaseCardServices;
use App\Services\Card\ICardConfig;

class DdzConfigServices extends BaseCardServices implements ICardConfig
{
    public function setCompose(int $packNum): self
    {
        if ($packNum < 1) {
            throw new \Exception('最少一副牌');
        }

        if ($packNum > 4) {
            throw new \Exception('目前斗地主仅支持最多4副牌打法');
        }

        // 斗地主保留完整牌
        $packDetail = CardEnum::getPackCards();

        $res = [];
        for ($i = 0; $i < $packNum; $i++) {
            $res = array_merge($res, $packDetail);
        }

        $this->cardsPool = $res;

        return $this;
    }

    public function setPlayerNum(int $num): self
    {
        if ($num < 3 || $num > 4) {
            throw new \Exception('斗地主人数限制为3-4人');
        }

        for ($i=0;$i<$num;$i++){
            $this->players[$i] = [
                'name' => '',
                'role' => 0,
            ];
        }

        return $this;
    }

    public function setPlayerInfo(int $playerNo, string $name): self
    {
        $this->players[$playerNo]['name'] = $name;

        return $this;
    }

    public function setPlayerRole(int $playerNo, int $role): self
    {
        $this->players[$playerNo]['role'] = $role;

        return $this;
    }

    public function setGameType(int $gameType): self
    {
        $this->gameType = $gameType;

        return $this;
    }

    public function setBaseScore(int $score): self
    {
        $this->baseScore = $score;

        return $this;
    }

    public function setDoubleCondition(array $conditions): self
    {
        // TODO: Implement setDoubleCondition() method.
    }

    public function setPlayRulesConfig(array $rules): self
    {
        // TODO: Implement setPlayRulesConfig() method.
    }
}
