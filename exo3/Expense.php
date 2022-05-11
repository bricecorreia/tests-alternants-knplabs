<?php

require_once('User.php');

abstract class Expense
{
    protected float $unitaryShared;
    protected float $userShare;

    /**
     * @param array <string, User> $participants
     */
    public function __construct(
        protected float $amount,
        protected string $description,
        protected DateTime $happenedAt,
        protected User $payer,
        protected array $participants,
    ) {
    }

    abstract function getType();

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHappenedAt(): \DateTime
    {
        return $this->happenedAt;
    }

    public function getPayer(): User
    {
        return $this->payer;
    }

    /**
     * Get the value of unitaryShared
     */
    public function getUnitaryShared(): float
    {
        $this->unitaryShared = $this->amount / count($this->participants);

        return $this->unitaryShared;
    }

    /**
     * Get the value of userShare
     */
    public function getUserShare($user): float
    {
        $totalShare = 0;

        if ($user === $this->payer) {

            $totalShare += $this->amount;
        }

        foreach ($this->participants as $participant) {

                if ($user == $participant) {

                    $totalShare -= $this->unitaryShared;
                }
        }
        return $totalShare;
    }
}
