<?php

namespace App\Enum;

class UserRole
{
  public const ADMIN=3;
  public const SUPEREMPLOYEE=2;
  public const EMPLOYEE=1;

  public const TYPES=[
    self::ADMIN,
    self::SUPEREMPLOYEE,
    self::EMPLOYEE
  ];

  public const NUMBERTYPES=[
      'employee',
      'superemployeer',
      'admin'
  ];

}
