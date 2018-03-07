<?php

namespace NCMF\RoleHierarchyBundle\Entity;

/**
 * Role
 */
class Role
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $enabled;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Role
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Role
     */
    public function setDesscription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Role
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
    /**
     * @var integer
     */
    private $lft;

    /**
     * @var integer
     */
    private $rgt;

    /**
     * @var integer
     */
    private $lvl;

    /**
     * @var \NCMF\RoleHierarchyBundle\Entity\Role
     */
    private $root;

    /**
     * @var \NCMF\RoleHierarchyBundle\Entity\Role
     */
    private $parent;


    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return Role
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return Role
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return Role
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Role
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set root
     *
     * @param \NCMF\RoleHierarchyBundle\Entity\Role $root
     *
     * @return Role
     */
    public function setRoot(\NCMF\RoleHierarchyBundle\Entity\Role $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return \NCMF\RoleHierarchyBundle\Entity\Role
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set parent
     *
     * @param \NCMF\RoleHierarchyBundle\Entity\Role $parent
     *
     * @return Role
     */
    public function setParent(\NCMF\RoleHierarchyBundle\Entity\Role $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \NCMF\RoleHierarchyBundle\Entity\Role
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add child
     *
     * @param \NCMF\RoleHierarchyBundle\Entity\Role $child
     *
     * @return Role
     */
    public function addChild(\NCMF\RoleHierarchyBundle\Entity\Role $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \NCMF\RoleHierarchyBundle\Entity\Role $child
     */
    public function removeChild(\NCMF\RoleHierarchyBundle\Entity\Role $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function getRole(){
        return $this->code;
    }

    public function getIndentName()
    {
        return str_repeat(' — ', $this->getLvl()) . $this->name;
    }
}
