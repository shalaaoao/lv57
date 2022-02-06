<?php

namespace App\Services\Card;

/**
 * 游戏动作相关接口
 * Interface ICardAction
 * @package App\Services\Card
 */
interface ICardAction
{
    /**
     * 出牌
     * @param int $cardNo
     */
    public function playCards(int $cardNo): void;

    /**
     * 发牌
     */
    public function dealCards(): void;

    /**
     * 洗牌
     */
    public function shuffleCards(): void;

    /**
     * 提示
     */
    public function hint(): void;

    /**
     * 淘汰
     */
    public function eliminate(): void;

    /**
     * 游戏结束
     */
    public function gameOver(): void;
}
