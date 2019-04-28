<?php
return [
    //应用ID,您的APPID。
    'app_id' => "2016092600603227",




    //商户私钥
    'merchant_private_key' => "MIIEpAIBAAKCAQEArz+mPLC5r0OhokdyMgQjpfxlaykf1oknsG8A1IitvdfwS6LPM7JYhcn/YItXBfc6Hw1gt46A2FGIlRLkIVdT3Xr1nfszxrD0xsEO/zoJd6pzArE2XYA0kyfAyEFYsO7C3dZKKTriJjA71gYD8zH0stJXvsIC49IMl5SW5cBSfjSIZ/hCDtqxpqeaMNWEgDdztFVOFzGzdJqxwV82Cvk2BhA8jBmnUJwexhF6doSrXq3DdwnuRp4Q5SC5zEw47Wuv85odqRjKmVtHhL7Y5BBfvUvMPnwUM3VWOxsCOpWeJMTFxX5zwOy19YxqJAC8LmcB46lXAplHFs4/rAys5xpvQwIDAQABAoIBADXlMj+57fEbsIrSxCjjov76J0qUhCkbVyxohu3V9vDKhykLsgNpFtZWcAaF88Zu6N4B5DuvRKrCMGoAPE6Qp8cWeJEUXzD83Np/JxiRBbZaojIyw9BvjDuxXxV3G0qWszE8JOSXKlOqQ8ynXvGc7G9ORxPwYKklwR+g3+NaiUQsa3rTG6VhX1lOAkvuVUewCxebmhLwNNEBIjAwcIARKR4qu0pbDimu1NUPyP+ut1cebXYAjom3YfmcRFnrwwQL9f6eeVDnC6GCCkIqN0M95+HnF6q5MWnGPrywmruHHV2pXNirHNdPpK25VkwZ6n6I3no64+AKhgs2VEgs/JBzB7kCgYEA1I+aU9K7aL9hdKGm2QC8X/T4noPoCb3+GKqDXPG8CoXDIEC7PGWSlWHiqGgvyT4UPIBTUFA2xDSVgPqnsmov7bd1UDcx3DXX1MA1kNhD67l1FopAzrhL3w2KFpX9EHuEH2kjmbVMRtHrCszeu04nl8MjcE9xtRZuTQlDVZUh8Q8CgYEA0xABR4iI2dUUsR/1nJ/KGKrdmRlzZ0TObH1w+yUhxTLZV7lSZTfrfa6OLt+BKSGUp7cxTqnGp3SAHwuI836Vv6/wHgTURA3Btt7zETun70K8txQAyquL6+s79FECRRMV3VHta9qeL6Ov9BuzErdH0qWeOSwEgA65CwD3FS14to0CgYEAmAUoM6D4Rb7yHS7rnDFpiBs0oHHoRudpzgxNLPD6MnBeEDgbcOOYBVxfdWAmJQBQCsEgVMU5lfOhpQAfZXuKUbIupbMD5uFfPhpFdRUm5nTZ58fy96VZJeqSAvs8ZUhhQvG381t1dQT229+PwFfx+xklxFIdGY00T8Y7MP8aqkMCgYEAqX0sydjmrKbkGujjP4dBr1Vm5k790Wv7qDuDwuoqmEUhK8TyWb3yKddG7nUlL3Z7/cKqodTMZiSzzjphG8gHUQtj83dFTfEOImAfKTOSxBv/l7VEfXwMvMMGPkffXsDYygXEdtv0M6Vq4shroRf1YT8GNDsY0g0Ao8l+oU8GpPECgYA399GlFMwKw6C2Yc5c08TXduLkQKhf/hsHtbeSShEH88afT5JIyjJzw4KcIpcQl6mjaDYCmYwolmmeYwzH3wQuzk7svAZV0cmym7I71AlGosyvJA11MvBE/Yp5LnNSdWCuJSCBJXCG56NuYqTNak07yUysOTx4tlWfABSX67v+jw==",




    //异步通知地址
    'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",




    //同步跳转
    'return_url' => "http://www.laravela.com/user",




    //编码格式
    'charset' => "UTF-8",




    //签名方式
    'sign_type'=>"RSA2",




    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",




    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArz+mPLC5r0OhokdyMgQjpfxlaykf1oknsG8A1IitvdfwS6LPM7JYhcn/YItXBfc6Hw1gt46A2FGIlRLkIVdT3Xr1nfszxrD0xsEO/zoJd6pzArE2XYA0kyfAyEFYsO7C3dZKKTriJjA71gYD8zH0stJXvsIC49IMl5SW5cBSfjSIZ/hCDtqxpqeaMNWEgDdztFVOFzGzdJqxwV82Cvk2BhA8jBmnUJwexhF6doSrXq3DdwnuRp4Q5SC5zEw47Wuv85odqRjKmVtHhL7Y5BBfvUvMPnwUM3VWOxsCOpWeJMTFxX5zwOy19YxqJAC8LmcB46lXAplHFs4/rAys5xpvQwIDAQAB",
];