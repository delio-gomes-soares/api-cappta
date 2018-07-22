<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Merchant", inversedBy="transactions")
     */
    private $merchant;

    /**
     * @ORM\Column(type="integer")
     */
    private $checkoutCode;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $cipheredCardNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $amountInCent;

    /**
     * @ORM\Column(type="integer")
     */
    private $installments;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Acquirer", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $acquirer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PaymentMethod", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paymentMethod;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CardBrand", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cardBrand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatusInfo", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statusInfo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $acquirerAuthorizationDataTime;

    public function getId()
    {
        return $this->id;
    }

    public function getMerchant(): ?Merchant
    {
        return $this->merchant;
    }

    public function setMerchant(?Merchant $merchant): self
    {
        $this->merchant = $merchant;

        return $this;
    }

    public function getCheckoutCode(): ?int
    {
        return $this->checkoutCode;
    }

    public function setCheckoutCode(int $checkoutCode): self
    {
        $this->checkoutCode = $checkoutCode;

        return $this;
    }

    public function getCipheredCardNumber(): ?string
    {
        return $this->cipheredCardNumber;
    }

    public function setCipheredCardNumber(string $cipheredCardNumber): self
    {
        $this->cipheredCardNumber = $cipheredCardNumber;

        return $this;
    }

    public function getAmountInCent(): ?int
    {
        return $this->amountInCent;
    }

    public function setAmountInCent(int $amountInCent): self
    {
        $this->amountInCent = $amountInCent;

        return $this;
    }

    public function getInstallments(): ?int
    {
        return $this->installments;
    }

    public function setInstallments(int $installments): self
    {
        $this->installments = $installments;

        return $this;
    }

    public function getAcquirer(): ?Acquirer
    {
        return $this->acquirer;
    }

    public function setAcquirer(?Acquirer $acquirer): self
    {
        $this->acquirer = $acquirer;

        return $this;
    }

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getCardBrand(): ?CardBrand
    {
        return $this->cardBrand;
    }

    public function setCardBrand(?CardBrand $cardBrand): self
    {
        $this->cardBrand = $cardBrand;

        return $this;
    }

    public function getStatusInfo(): ?StatusInfo
    {
        return $this->statusInfo;
    }

    public function setStatusInfo(?statusInfo $statusInfo): self
    {
        $this->statusInfo = $statusInfo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAcquirerAuthorizationDataTime(): ?\DateTimeInterface
    {
        return $this->acquirerAuthorizationDataTime;
    }

    public function setAcquirerAuthorizationDataTime(\DateTimeInterface $acquirerAuthorizationDataTime): self
    {
        $this->acquirerAuthorizationDataTime = $acquirerAuthorizationDataTime;

        return $this;
    }
}
