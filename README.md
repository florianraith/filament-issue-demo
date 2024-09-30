# Filament Issue Demonstration

When aggregating options for a select input with a defined relationship, the middlewares assigned in the panel provider are not used for the request. Instead, the `web` middlewares are used.

This repository has a Post model which can have multiple Tags. Both Posts and Tags belong to tenants. A global tenant ID, which is set by the `SetGlobalTenant` middleware, is used to globally scope the Posts and Tags. The issue occurs when trying to select a Tag for a Post; the Tags vanish as soon as you click on the select input. This is due to a request that aggregates all the Tag options, but the SetGlobalTenant middleware is not applied; thus, for the global scopes, the default value of -1 is used.

To reproduce, clone this repository, seed the database, and edit a specific Post.

This is how it looks when entering the page. So far, it shows the correctly assigned Tags:
<img width="683" alt="image" src="https://github.com/user-attachments/assets/19828398-6111-48cb-9021-e3a67f4b65e7">

As soon as you click on the select, the Tags vanish due to a new request made without the middleware:
<img width="688" alt="image" src="https://github.com/user-attachments/assets/8523e46a-fc56-4a49-91b4-83084f0f4229">
