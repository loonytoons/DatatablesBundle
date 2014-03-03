<?php

/**
 * This file is part of the TommyGNRDatatablesBundle package.
 *
 * (c) Tom Corrigan <https://github.com/tommygnr/DatatablesBundle>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TommyGNR\DatatablesBundle\Column;

/**
 * Class AbstractColumn
 *
 */
abstract class AbstractColumn implements ColumnInterface
{
    /**
     * An entity's property.
     *
     * @var null|string
     */
    private $property;

    /**
     * Used to read data from any JSON data source property.
     *
     * @var mixed
     */
    private $data;

    /**
     * Enable or disable filtering on the data in this column.
     *
     * @var boolean
     */
    private $searchable;

    /**
     * Enable or disable sorting on this column.
     *
     * @var boolean
     */
    private $sortable;

    /**
     * Enable or disable the display of this column.
     *
     * @var boolean
     */
    private $visible;

    /**
     * The title of this column.
     *
     * @var null|string
     */
    private $title;

    /**
     * This property is the rendering partner to data
     * and it is suggested that when you want to manipulate data for display.
     *
     * @var null|mixed
     */
    private $render;

    /**
     * Class to give to each cell in this column.
     *
     * @var string
     */
    private $class;

    /**
     * Allows a default value to be given for a column's data,
     * and will be used whenever a null data source is encountered.
     * This can be because data is set to null, or because the data
     * source itself is null.
     *
     * @var null|string
     */
    private $defaultContent;

    /**
     * Defining the width of the column.
     * This parameter may take any CSS value (em, px etc).
     *
     * @var null|string
     */
    private $width;

    /**
     * Constructor.
     *
     * @param null|string $property An entity's property
     */
    public function __construct($property = null)
    {
        $this->property = $property;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * {@inheritdoc}
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function setSearchable($searchable)
    {
        $this->searchable = $searchable;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isSearchable()
    {
        return $this->searchable;
    }

    /**
     * {@inheritdoc}
     */
    public function setSortable($sortable)
    {
        $this->sortable = $sortable;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isSortable()
    {
        return $this->sortable;
    }

    /**
     * {@inheritdoc}
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setRender($render)
    {
        $this->render = $render;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRender()
    {
        return $this->render;
    }

    /**
     * {@inheritdoc}
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultContent($defaultContent)
    {
        $this->defaultContent = $defaultContent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultContent()
    {
        return $this->defaultContent;
    }

    /**
     * {@inheritdoc}
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options)
    {
        if (array_key_exists('searchable', $options)) {
            $this->setSearchable($options['searchable']);
        }
        if (array_key_exists('sortable', $options)) {
            $this->setSortable($options['sortable']);
        }
        if (array_key_exists('visible', $options)) {
            $this->setVisible($options['visible']);
        }
        if (array_key_exists('title', $options)) {
            $this->setTitle($options['title']);
        }
        if (array_key_exists('render', $options)) {
            $this->setRender($options['render']);
        }
        if (array_key_exists('class', $options)) {
            $this->setClass($options['class']);
        }
        if (array_key_exists('default', $options)) {
            $this->setDefaultContent($options['default']);
        }
        if (array_key_exists('width', $options)) {
            $this->setWidth($options['width']);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaults()
    {
        $this->setData($this->property);
        $this->setSearchable(true);
        $this->setSortable(true);
        $this->setVisible(true);
        $this->setTitle(null);
        $this->setRender(null);
        $this->setClass('');
        $this->setDefaultContent(null);
        $this->setWidth(null);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getClassName();
}