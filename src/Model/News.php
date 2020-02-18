<?php


namespace App\Model;


use DateTime;

class News
{
    /**
     * @var string|null
     */
    private $title;
    /**
     * @var string|null
     */
    private $intro;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var DateTime|null
     */
    private $datePublished;
    /**
     * @var string|null
     */
    private $image;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getIntro(): ?string
    {
        return $this->intro;
    }

    /**
     * @param string|null $intro
     */
    public function setIntro(?string $intro): void
    {
        $this->intro = $intro;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|array|null $description
     */
    public function setDescription($description): void
    {
        if (is_array($description)) {
            $description = '<p>' . implode('</p><p>', $description) . '</p>';
        }

        $this->description = $description;
    }

    /**
     * @return DateTime|null
     */
    public function getDatePublished(): ?DateTime
    {
        return $this->datePublished;
    }

    /**
     * @param DateTime|null $datePublished
     */
    public function setDatePublished(?DateTime $datePublished): void
    {
        $this->datePublished = $datePublished;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}
