<?php

namespace Github\Api\Repository;

use Github\Api\AbstractApi;

/**
 * @link   http://developer.github.com/v3/repos/commits/
 *
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Commits extends AbstractApi
{
    public function all($username, $repository, array $params)
    {
        return $this->get('/repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/commits', $params);
    }

    public function compare($username, $repository, $base, $head, $mediaType = null, array $params = [])
    {
        $headers = [];
        if (null !== $mediaType) {
            $headers['Accept'] = $mediaType;
        }

        return $this->get('/repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/compare/'.rawurlencode($base).'...'.rawurlencode($head), $params, $headers);
    }

    public function show($username, $repository, $sha)
    {
        return $this->get('/repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/commits/'.rawurlencode($sha));
    }

    public function pulls($username, $repository, $sha, array $params = [])
    {
        return $this->get('/repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/commits/'.rawurlencode($sha).'/pulls', $params);
    }
}
