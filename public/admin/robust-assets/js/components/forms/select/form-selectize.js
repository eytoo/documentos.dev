! function(a, b, c) {
    "use strict";
    c(".input-selectize").selectize({
        persist: !1,
        createOnBlur: !0,
        create: !0
    }), c(".selectize-select").selectize({
        create: !0,
        sortField: {
            field: "text",
            direction: "asc"
        },
        dropdownParent: "body"
    }), c(".selectize-multiple").selectize(), c(".confirm-selectize").selectize({
        delimiter: ",",
        persist: !1,
        onDelete: function(a) {
            return confirm(a.length > 1 ? "Are you sure you want to remove these " + a.length + " items?" : 'Are you sure you want to remove "' + a[0] + '"?')
        }
    });
    var d = "([a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)",
        e = function(a) {
            return c.trim((a.first_name || "") + " " + (a.last_name || ""))
        };
    c(".select-contact").selectize({
        persist: !1,
        maxItems: null,
        valueField: "email",
        labelField: "name",
        searchField: ["first_name", "last_name", "email"],
        sortField: [{
            field: "first_name",
            direction: "asc"
        }, {
            field: "last_name",
            direction: "asc"
        }],
        options: [{
            email: "lio@kesta.com",
            first_name: "Lio",
            last_name: "Kesta"
        }, {
            email: "brian@carter.com",
            first_name: "Brian",
            last_name: "Carter"
        }, {
            email: "someone@gmail.com"
        }],
        render: {
            item: function(a, b) {
                var c = e(a);
                return "<div>" + (c ? '<span class="name">' + b(c) + "</span>" : "") + (a.email ? '<span class="email">' + b(a.email) + "</span>" : "") + "</div>"
            },
            option: function(a, b) {
                var c = e(a),
                    d = c,
                    f = a.email;
                return '<div><span class="label">' + b(d) + "</span>" + (f ? '<span class="caption">' + b(f) + "</span>" : "") + "</div>"
            }
        },
        createFilter: function(a) {
            var b = new RegExp("^" + d + "$", "i"),
                c = new RegExp("^([^<]*)<" + d + ">$", "i");
            return b.test(a) || c.test(a)
        },
        create: function(a) {
            if (new RegExp("^" + d + "$", "i").test(a)) return {
                email: a
            };
            var b = a.match(new RegExp("^([^<]*)<" + d + ">$", "i"));
            if (b) {
                var e = c.trim(b[1]),
                    f = e.indexOf(" "),
                    g = e.substring(0, f),
                    h = e.substring(f + 1);
                return {
                    email: b[2],
                    first_name: g,
                    last_name: h
                }
            }
            return alert("Invalid email address."), !1
        }
    });
    var f = function(a) {
        return function() {
            c("#log").html('<small class="text-muted">Current Event : <code> ' + a + "</code></small>")
        }
    };
    c(".selectize-event").selectize({
        create: !0,
        onChange: f("onChange"),
        onItemAdd: f("onItemAdd"),
        onItemRemove: f("onItemRemove"),
        onOptionAdd: f("onOptionAdd"),
        onOptionRemove: f("onOptionRemove"),
        onDropdownOpen: f("onDropdownOpen"),
        onDropdownClose: f("onDropdownClose"),
        onFocus: f("onFocus"),
        onBlur: f("onBlur"),
        onInitialize: f("onInitialize")
    });
    c(".repositories").selectize({
        valueField: "url",
        labelField: "name",
        searchField: "name",
        options: [],
        create: !1,
        render: {
            option: function(a, b) {
                return '<div><span class="title"><span class="name"><i class="icon ' + (a.fork ? "fork" : "source") + '"></i>' + b(a.name) + '</span><span class="by">' + b(a.username) + '</span></span><span class="description">' + b(a.description) + '</span><ul class="meta">' + (a.language ? '<li class="language">' + b(a.language) + "</li>" : "") + '<li class="icon-eye6"><span>' + b(a.watchers) + '</span> watchers</li><li class="icon-code-fork"><span>' + b(a.forks) + "</span> forks</li></ul></div>"
            }
        },
        score: function(a) {
            var b = this.getScoreFunction(a);
            return function(a) {
                return b(a) * (1 + Math.min(a.watchers / 100, 1))
            }
        },
        load: function(a, b) {
            return a.length ? void c.ajax({
                    url: "https://api.github.com/legacy/repos/search/" + encodeURIComponent(a),
                    type: "GET",
                    error: function() {
                        b()
                    },
                    success: function(a) {
                        b(a.repositories.slice(0, 10))
                    }
                }) : b()
        }
    }), c(".selectize-locked").selectize({
        create: !0
    }), c(".selectize-locked")[0].selectize.lock(), c(".selectize-sort").selectize({
        sortField: "text"
    });
    for (var g = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV", h = [], i = 0; i < 25e3; i++) {
        for (var j = [], k = 0; k < 8; k++) j.push(g.charAt(Math.round((g.length - 1) * Math.random())));
        h.push({
            id: i,
            title: j.join("")
        })
    }
    c(".selectize-junk").selectize({
        maxItems: null,
        maxOptions: 100,
        valueField: "id",
        labelField: "title",
        searchField: "title",
        sortField: "title",
        options: h,
        create: !1
    }), c(".selectize-movie").selectize({
        valueField: "title",
        labelField: "title",
        searchField: "title",
        options: [],
        create: !1,
        render: {
            option: function(a, b) {
                for (var c = [], d = 0, e = a.abridged_cast.length; d < e; d++) c.push("<span>" + b(a.abridged_cast[d].name) + "</span>");
                return '<div><img src="' + b(a.posters.thumbnail) + '" alt=""><span class="title"> <span class="name">' + b(a.title) + '</span></span><span class="description">' + b(a.synopsis || "No synopsis available at this time.") + '</span><span class="actors">' + (c.length ? "Starring " + c.join(", ") : "Actors unavailable") + "</span></div>"
            }
        },
        load: function(a, b) {
            return a.length ? void c.ajax({
                    url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
                    type: "GET",
                    dataType: "jsonp",
                    data: {
                        q: a,
                        page_limit: 10,
                        apikey: "6czx2pst57j3g47cvq9erte5"
                    },
                    error: function() {
                        b()
                    },
                    success: function(a) {
                        console.log(a.movies), b(a.movies)
                    }
                }) : b()
        }
    }), c(".selectize-links").selectize({
        theme: "links",
        maxItems: null,
        valueField: "id",
        searchField: "title",
        options: [{
            id: 1,
            title: "DIY",
            url: "https://diy.org"
        }, {
            id: 2,
            title: "Google",
            url: "http://google.com"
        }, {
            id: 3,
            title: "Yahoo",
            url: "http://yahoo.com"
        }],
        render: {
            option: function(a, b) {
                return '<div class="option"><span class="title">' + b(a.title) + '</span><span class="url">' + b(a.url) + "</span></div>"
            },
            item: function(a, b) {
                return '<div class="item"><a href="' + b(a.url) + '">' + b(a.title) + "</a></div>"
            }
        },
        create: function(a) {
            return {
                id: 0,
                title: a,
                url: "#"
            }
        }
    }), c(".remove-tags").selectize({
        plugins: ["remove_button"],
        persist: !1,
        create: !0,
        render: {
            item: function(a, b) {
                return '<div>"' + b(a.text) + '"</div>'
            }
        },
        onDelete: function(a) {
            return confirm(a.length > 1 ? "Are you sure you want to remove these " + a.length + " items?" : 'Are you sure you want to remove "' + a[0] + '"?')
        }
    }), c(".backup-restore").selectize({
        plugins: ["restore_on_backspace"],
        persist: !1,
        create: !0
    }), c(".selectise-drap-drop").selectize({
        plugins: ["drag_drop"],
        persist: !1,
        create: !0
    }), c(".selectize-rtl-input").selectize({
        persist: !1,
        create: !0
    }), c(".selectize-rtl-select").selectize()
}(window, document, jQuery);