import { Component, OnInit } from "@angular/core";

import { News } from "@context/models";
import { NewsDispatcher, NewsSelector } from "@context/store";

@Component({
    selector: "app-news",
    templateUrl: "./news.component.html",
    styleUrls: ["./news.component.css"]
})
export class NewsComponent implements OnInit {

    newsList: News[];

    constructor(private selector: NewsSelector,
                private dispatcher: NewsDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.newsList = [...data]);

    }
}
