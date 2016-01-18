<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 1/18/16
 * Time: 7:33 PM
 */

namespace Mchekin\UrlHandler;


class Url
{
    protected $scheme;
    protected $host;
    protected $port;
    protected $user;
    protected $pass;
    protected $path;
    protected $query;
    protected $fragment;

    /**
     * @param $url
     */
    public function __construct($url)
    {
        $components = parse_url($url);

        if ($components === false ) {
            throw new \InvalidArgumentException('Malformed URL: ' . $url);
        }

        $this->scheme = isset($components['scheme']) ? $components['scheme'] : '';
        $this->host = isset($components['host']) ? $components['host'] : '';
        $this->port = isset($components['port']) ? $components['port'] : '';
        $this->user = isset($components['user']) ? $components['user'] : '';
        $this->pass = isset($components['pass']) ? $components['pass'] : '';
        $this->path = isset($components['path']) ? $components['path'] : '';
        $this->query = isset($components['query']) ? $components['query'] : '';
        $this->fragment = isset($components['fragment']) ? $components['fragment'] : '';

        var_dump($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {

        $scheme   = ($this->scheme !== '') ? $this->scheme . '://' : '';
        $host     = ($this->host !== '') ? $this->host : '';
        $port     = ($this->port !== '') ? ':' . $this->port : '';
        $user     = ($this->user !== '') ? $this->user : '';
        $pass     = ($this->pass !== '') ? ':' . $this->pass  : '';
        $pass     = ($user || $pass) ? "$pass@" : '';
        $path     = ($this->path !== '') ? $this->normalizePath($this->path) : '';
        $query    = ($this->query !== '') ? '?' . $this->query : '';
        $fragment = ($this->fragment !== '') ? '#' . $this->fragment : '';

        return $scheme.$user.$pass.$host.$port.$path.$query.$fragment;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * Converts relative paths containing '.' and '..' to absolute ones
     *
     * @param string $path
     * @return string
     */
    protected function normalizePath($path)
    {
        $path = explode('/', $path);
        $keys = array_keys($path, '..');

        var_dump($keys);

        foreach($keys AS $position => $key)
        {
            $offset = $key - ($position * 2 + 1);
            echo $offset.'<br>';
            array_splice($path, $offset, 2);
        }

        $path = implode('/', $path);
        $path = str_replace('./', '', $path);

        return $path;
    }
}