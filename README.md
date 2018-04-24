# one_time_grant

Provide a custom grant type for drupal/simple_auth.


本模块的目的，是解决原生ios/android app或 h5 SPA 手机登录或第三方帐号登录时，获取 oauth2 access_token的问题。
Oauth2.0 提供的标准 grant type中，是需要用户名和密码来授权的，因为手机号登录，微信登录之类的登录方式就无法直接授权了。

为了统一解决上述问题，本模块自定义了一个 grant type，使用一个一次性的 token来授权，从而获取 oauth2 access_token。


### 原理

- 客户端调用 手机号登录 或 微信登录 接口登录，服务端验证成功后，
调用本模块的服务，生成 one_time_token，并返回给客户端。

- 客户端使用 one_time_token，请求oauth2授权，获取 access_token。


