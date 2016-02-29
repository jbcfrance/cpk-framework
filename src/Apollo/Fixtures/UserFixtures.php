<?php
/* 
 * The MIT License
 *
 * Copyright 2016 jean-baptisteciepka.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Apollo\Fixtures;

use Apollo\Entity\User;
use Apollo\Entity\Roles;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class UserFixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $role = new Roles();
        $role->setRole('ADMIN');
        $role->setCanCreate(true);
        $role->setCanModif(true);
        $role->setCanView(true);
        $role->setModifFields(null);
        $manager->persist($role);


        $user = new User();
        $user->setLogin('admin');
        $user->setPassword('admin');
        $user->setLang('admin');
        $user->setPassword('admin');
        $user->setRole($role);

        $manager->persist($user);
        $manager->flush();
    }
}